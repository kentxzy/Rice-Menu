<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Rice Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="screen-container">
        <div class="library-card">
            
            <div class="header-section">
                <span class="pill-badge">Inventory</span>
                <h1>Rice Market Menu</h1>
                <p class="instruction-text">Manage your rice items here.</p>
            </div>

            <div style="margin-top: 15px;" class="action-bar">
                <a href="{{ route('menus.create') }}" class="btn-primary" style="text-decoration: none; text-align: center; display: inline-block;">+ Add New Item</a>
                <a href="{{ route('orders.index') }}" class="btn-edit" style="text-decoration: none; padding: 10px; margin-left: 10px;">View Orders</a>
                <a href="{{ route('payments.index') }}" class="btn-edit" style="text-decoration: none; padding: 10px; margin-left: 10px;">View Payments</a>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->rice_name }}</td>
                            <td>{{ $menu->description }}</td>
                            <td>₱{{ number_format($menu->price, 2) }}</td>
                            <td>{{ $menu->stock }}</td>
                            <td class="table-actions">
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn-sm btn-edit">Edit</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                </form>
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