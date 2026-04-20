<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipts</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="screen-container">
        <div class="library-card">
            
            <div class="header-section">
                <span class="pill-badge">Order Management</span>
                <h1>Order Receipts</h1>
                <a href="{{ route('orders.create') }}" class="btn-primary" style="text-decoration: none; padding: 10px; text-align: center;">+ New Order</a>
                <a href="{{ route('payments.index') }}" class="btn-primary" style="text-decoration: none; padding: 10px; text-align: center;">View Payments</a>
                <a href="{{ route('menus.index') }}" class="btn-primary" style="text-decoration: none; padding: 10px; text-align: center;">View Menu</a>
            </div>

            <table style="width: 100%; text-align: left; margin-top: 20px;">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Rice Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->menu->rice_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>₱{{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>