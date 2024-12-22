<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Thêm Sản Phẩm</title>
</head>
<body>

    <div class="container-xl">
        <h1 class="mt-5">Thêm Sản Phẩm Mới</h1>
        <form action="{{ route('products.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf

            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="product_name" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <!-- Hình ảnh sản phẩm -->
            <div class="mb-3">
                <label for="image" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="mb-3">
                <label for="category_name" class="form-label">Danh Mục</label>
                <select class="form-control" id="category_name" name="category_name" required>
                    <option value="Electronics">Electronics</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Home Appliances">Home Appliances</option>
                </select>
            </div>

            <!-- Nút Submit và Hủy -->
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

</body>
</html>
