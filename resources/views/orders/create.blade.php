<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="screen-container">
        <div class="library-card">
            
            <div class="header-section">
                <span class="pill-badge">Create Order</span>
                <h1>Create New Order</h1>
                <p class="instruction-text">Select Rice and Enter the order details below.</p>
            </div>

            <form method="POST" action="{{ route('orders.store') }}">
                @csrf

                <div class="form-group">
                    <label>Select Rice</label>
                    <select name="menu_id" class="form-control" required>
                        <option value="" disabled selected>-- Choose Rice --</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->rice_name }} (₱{{ $menu->price }}/kg) - Stock: {{ $menu->stock }}kg</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Quantity (₱)</label>
                    <input type="number" name="quantity" step="0.01" class="form-control" placeholder="e.g. 5" required>
                </div>

                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" placeholder="e.g. 100" required>
                </div>

                <div class="form-group">
                    <a href="{{ route('menus.index') }}" class="btn-sm btn-edit" style="text-decoration: none; padding: 12px 24px; text-align: center;">Back</a>
                    <button type="submit" class="btn-primary">Place Order</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>