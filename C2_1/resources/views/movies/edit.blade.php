<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cập nhật Phim</title>
</head>

<body>
    <div class="container-xl">
        <h1 class="mt-5">Cập nhật Phim</h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Tiêu Đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Địa Điểm</label>
                <input type="number" class="form-control" id="location" name="location" value="{{ $product->location }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="number" class="form-control" id="email" name="email" value="{{ $product->email }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <input type="file" class="form-control" id="description" name="description" rows="3" value="{{ $product->description }}">
            </div>

            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Cập Nhật</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Hủy</a>
        </form>
    </div>
</body>

</html>
