<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rice_name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255'
        ]);

        Menu::create($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu item created successfully.');
    }

    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rice_name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255'
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validatedData);

        return redirect()->route('menus.index')->with('success', 'Menu item updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menu item deleted successfully.');
    }
}
