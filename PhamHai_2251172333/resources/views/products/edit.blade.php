<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Product</title>
</head>

<body>
    <div class="container-xl">
        <h1 class="mt-5">Update Product</h1>
        <form action="{{ route('products.update', $products->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <select class="form-control" id="category" name="category" value="{{ $products->category }}" required>
                    <option value="Mouse">Mouse</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Headset">Headset</option>
                    <option value="Monitor">Monitor</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $products->price }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" value="{{ $products->stock }}" required>
            </div>

            <div class="mb-3">
                <label for="supplier_email" class="form-label">Supplier Email</label>
                <input type="text" class="form-control" id="supplier_email" name="supplier_email" value="{{ $products->supllier_email }}" required>
            </div>

            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Update</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Cancel</a>
        </form>
    </div>
</body>

</html>
