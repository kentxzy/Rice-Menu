<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="screen-container">
        <div class="library-card">
            
            <div class="header-section">
                <span class="pill-badge">Inventory</span>
                <h1>Payment History</h1>
                <a href="{{ route('orders.index') }}" class="btn-primary" style="text-decoration: none; padding: 10px; text-align: center;">Back to Orders</a>
            </div>

            <table style="width: 100%; text-align: left; margin-top: 20px;">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Total Due</th>
                        <th>Amount Paid</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->order_id }} ({{ $payment->order->menu->rice_name }})</td>
                        <td>₱{{ number_format($payment->order->total_amount, 2) }}</td>
                        <td>₱{{ number_format($payment->amount_paid, 2) }}</td>
                        <td style="color: {{ $payment->status == 'Paid' ? 'green' : 'red' }}; font-weight: bold;">
                            {{ $payment->status }}
                        </td>
                        <td>
                            @if($payment->status != 'Paid')
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn-primary" style="text-decoration: none; padding: 8px 16px; white-space: nowrap; display: inline-block;">Pay Now</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>