<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.3.2/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="row p-3">
            <h4 class="text-uppercase text-decoration-underline text-center fw-bold text-success">Add New Good</h4>
            <form class="bg-info border border-2 border-success rounded-3" method="POST" action="{{route('goods.store')}}">
                @csrf
                <div class="input-group mt-3">
                    <span class="input-group-text fw-bold bg-light">Name</span>
                    <input required name='name' type="text" class="form-control" placeholder="">
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Quality</span>
                    <select class="form-select" name='quality'>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                </div>

                <div class="input-group mt-3">
                    <span class="input-group-text fw-bold bg-light">Description</span>
                    <input required name='description' type="text" class="form-control" placeholder="">
                </div>

                <div class="input-group mt-3">
                    <span class="input-group-text fw-bold bg-light">Price</span>
                    <input required name='price' type="number" class="form-control" placeholder="">
                </div>

                <div class="input-group mt-3">
                    <span class="input-group-text fw-bold bg-light">Quantity</span>
                    <input required name='quantity' type="number" class="form-control" placeholder="">
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text fw-bold bg-light">Khách hàng</span>
                    <select class="form-select" name='customerId'>
                        @foreach($customers as $item)
                        <option value="{{$item->customerId}}">{{$item->customerName}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-3 ">Thêm</button>
            </form>
        </div>
    </div>

    <script src="{{asset('assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery-3.7.1.min.js')}}"></script>
</body>

</html>