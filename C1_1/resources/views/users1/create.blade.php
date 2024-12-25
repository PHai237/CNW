<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>New User</title>
</head>
<body>

    <div class="container-xl">
        <h1 class="mt-5">New User</h1>
        <form action="{{ route('users1.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                    <option value="Moderator">Moderator</option>
                </select>
            </div>

            <!-- Nút Submit và Hủy -->
            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Add</button>
            <a href="{{ route('users1.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Cancel</a>
        </form>
    </div>

</body>
</html>
