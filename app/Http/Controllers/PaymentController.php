<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Display payment history
    public function index()
    {
        $payments = Payment::with('order.menu')->get();
        return view('payments.index', compact('payments'));
    }

    // Show form to process a payment
    public function edit(Payment $payment)
    {
        return view('payments.edit', compact('payment'));
    }

    // Update payment record and status
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0'
        ]);

        $status = $request->amount_paid >= $payment->order->total_amount ? 'Paid' : 'Unpaid';

        $payment->update([
            'amount_paid' => $request->amount_paid,
            'status' => $status
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment processed successfully!');
    }
}