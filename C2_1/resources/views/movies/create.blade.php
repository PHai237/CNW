<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Thêm Phim</title>
</head>
<body>

    <div class="container-xl">
        <h1 class="mt-5">Thêm Phim Mới</h1>
        <form action="{{ route('movies.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf

            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="location" class="form-label">Địa điểm</label>
                <input class="form-control" id="location" name="location" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="start_datetime" class="form-label">Thời Gian Bắt Đầu</label>
                <input type="date" class="form-control" id="start_datetime" name="start_datetime" required>
            </div>

            <div class="mb-3">
                <label for="end_datetime" class="form-label">Thời Gian Kết Thúc</label>
                <input type="date" class="form-control" id="end_datetime" name="end_datetime" required>
            </div>

            <div class="mb-3">
                <label for="organizer_email" class="form-label">Email</label>
                <input type="date" class="form-control" id="organizer_email" name="organizer_email" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <input type="file" class="form-control" id="description" name="description" rows="3"">
            </div>

            <!-- Nút Submit và Hủy -->
            <button type="submit" class="btn btn-primary">Thêm</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

</body>
</html>
