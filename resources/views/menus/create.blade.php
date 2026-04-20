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
                <h1>Register New Rice Item</h1>
                <p class="instruction-text">Enter the Rice details below.</p>
            </div>

            <form method="POST" action="{{ route('menus.store') }}">
                @csrf

                <div class="form-group">
                    <label>Rice Name</label>
                    <input type="text" name="rice_name" class="form-control" placeholder="e.g. Jasmine, Kuhako, etc." required>
                </div>

                <div class="form-group">
                    <label>Price per Kilogram (₱)</label>
                    <input type="number" name="price" class="form-control" placeholder="e.g. 60.00" required>
                </div>

                <div class="form-group">
                    <label>Stock Quantity</label>
                    <input type="number" name="stock" class="form-control" placeholder="e.g. 100" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="e.g. Aromatic and fluffy rice." rows="3"></textarea>
                </div>

                <div class="form-actions">
                    <a href="{{ route('menus.index') }}" class="btn-sm btn-edit" style="text-decoration: none; padding: 12px 24px; text-align: center;">Back</a>
                    <button type="submit" class="btn-primary">Save Item</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>