<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Payment;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('menu')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all(); 
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|numeric|min:0.1'
        ]);

        $menu = Menu::findOrFail($request->menu_id);

        $total_amount = $request->quantity * $menu->price;

        $order = Order::create([
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'total_amount' => $total_amount
        ]);

        Payment::create([
            'order_id' => $order->id,
            'amount_paid' => 0,
            'status' => 'Unpaid'
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }
}