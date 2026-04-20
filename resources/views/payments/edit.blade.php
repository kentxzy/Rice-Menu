<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Payment</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="screen-container">
        <div class="library-card">
            <div class="header-section">
                <span class="pill-badge">Payments</span>
                <h1>Process Payment</h1>
                <p class="instruction-text">Order #{{ $payment->order_id }} - {{ $payment->order->menu->rice_name }}</p>
                <h2 style="color: red;">Total Due: ₱{{ number_format($payment->order->total_amount, 2) }}</h2>
            </div>

            <form method="POST" action="{{ route('payments.update', $payment->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Amount Tendered (₱)</label>
                    <input type="number" name="amount_paid" step="0.01" class="form-control" value="{{ $payment->amount_paid }}" required>
                </div>

                <div class="form-actions">
                    <a href="{{ route('payments.index') }}" class="btn-sm btn-edit" style="text-decoration: none; padding: 12px 24px;">Cancel</a>
                    <button type="submit" class="btn-primary">Submit Payment</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>