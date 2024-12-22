<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap CRUD Data Table for Products</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            color: #495057;
            background: #e9ecef;
            font-family: 'Varela Round', sans-serif;
            font-size: 14px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table-title {
            background: #007bff;
            color: white;
            padding: 16px 30px;
            border-radius: 8px 8px 0 0;
        }

        .table-title h2 {
            margin: 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: white;
            font-size: 14px;
            border-radius: 3px;
            background: #28a745;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            font-size: 20px;
            margin-right: 5px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9ecef;
            padding: 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 120px;
        }

        table.table tr th:last-child {
            width: 120px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f1f1f1;
        }

        table.table td a {
            font-weight: bold;
            color: #007bff;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #0056b3;
        }

        table.table td a.edit {
            color: #ffc107;
        }

        table.table td a.delete {
            color: #dc3545;
        }

        .modal .modal-dialog {
            max-width: 500px;
        }

        .modal .modal-header {
            background-color: #dc3545;
            color: white;
        }

        .modal .modal-title {
            font-size: 18px;
        }

        .modal-footer {
            background: #f1f1f1;
        }

        .modal .btn {
            border-radius: 3px;
        }

        .btn-primary i {
            color: white !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();

            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Sản Phẩm</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('products.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm sản phẩm mới</span></a>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ number_format($product->price) }} VND</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="{{ $product->image }}" alt="{{ $product->product_name }}" style="width: 100px;"></td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" data-toggle="tooltip" title="Sửa">
                                    <i class="fa fa-pencil"></i> <!-- Thay bằng icon -->
                                </a>

                                <!-- Nút xóa kèm modal xác nhận -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" data-toggle="tooltip" title="Xóa">
                                    <i class="fa fa-trash"></i> <!-- Thay bằng icon -->
                                </button>

                                <!-- Modal xác nhận xóa -->
                                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $product->id }}">Xác nhận xóa</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa sản phẩm này không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Phân trang nếu cần --}}
                <div class="d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>