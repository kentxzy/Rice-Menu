<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Menu Item</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="screen-container">
        <div class="library-card">
            
            <div class="header-section">
                <span class="pill-badge">Rice Menu</span>
                <h1>Edit Rice Item</h1>
                <p class="instruction-text">Enter the Rice details below.</p>
            </div>

            <form method="POST" action="{{ route('menus.update', $menu->id) }}">
                @csrf
                @method('PUT')

                            <div class="form-group">
                    <label>Rice Name</label>
                    <input type="text" name="rice_name" class="form-control" value="{{ $menu->rice_name }}" required>
                </div>

                <div class="form-group">
                    <label>Price per Kilogram (₱)</label>
                    <input type="number" name="price" step="0.01" class="form-control" value="{{ $menu->price }}" required>
                </div>

                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" value="{{ $menu->stock }}" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $menu->description }}</textarea>
                </div>

                <div class="form-actions">
                    <a href="{{ route('menus.index') }}" class="btn-sm btn-edit" style="text-decoration: none; padding: 12px 24px; text-align: center;">Cancel</a>
                    <button type="submit" class="btn-primary">Update Item</button>
                </div>
                        </form>

        </div>
    </div>

</body>
</html>