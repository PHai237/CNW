<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Add New</title>
</head>
<body>

    <div class="container-xl">
        <h1 class="mt-5">Add New Product</h1>
        <form action="{{ route('products.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="Mouse">Mouse</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Headset">Headset</option>
                    <option value="Monitor">Monitor</option>
                </select>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <!-- Stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock">
            </div>

            <!-- Supplier Email -->
            <div class="mb-3">
                <label for="supplier_email" class="form-label">Supplier Email</label>
                <input type="text" class="form-control" id="supplier_email" name="supplier_email" required>
            </div>

            <!-- Nút Submit và Hủy -->
            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Add</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Cancel</a>
        </form>
    </div>

</body>
</html>
