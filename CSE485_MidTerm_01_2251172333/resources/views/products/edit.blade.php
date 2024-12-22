<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cập nhật Sản Phẩm</title>
</head>

<body>
    <div class="container-xl">
        <h1 class="mt-5">Cập nhật Sản Phẩm</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2" style="width: 150px;">
                @endif
            </div>

            <div class="mb-3">
                <label for="category_name" class="form-label">Danh Mục</label>
                <select class="form-control" id="category_name" name="category_name" required>
                    <option value="Electronics" {{ $product->category_name == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                    <option value="Accessories" {{ $product->category_name == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                    <option value="Gaming" {{ $product->category_name == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                    <option value="Home Appliances" {{ $product->category_name == 'Home Appliances' ? 'selected' : '' }}>Home Appliances</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Cập Nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Hủy</a>
        </form>
    </div>
</body>

</html>
