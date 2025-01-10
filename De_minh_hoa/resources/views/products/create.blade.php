<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Posts</title>
</head>

<body>


    <h1 style="margin: 50px 50px">Thêm Sản Phẩm Mới</h1>
    <form action="{{ route('products.store') }}" method="POST" style="margin: 50px 50px">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">ID Cửa hàng</label>
            <select class="form-control" id="store_name" name="name" required>
                <option value="" disabled selected>Chọn tên cửa hàng</option>
                @foreach($products as $product)
                <option value="{{ $product->store->id }}">{{ $product->store->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Ngày tạo</label>
            <input type="date" class="form-control" id="created_at" name="created_at" required>
        </div>

        <div class="mb-3">
            <label for="updated_at" class="form-label">Ngày cập nhật</label>
            <input type="date" class="form-control" id="updated_at" name="updated_at" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
    </form>

</body>