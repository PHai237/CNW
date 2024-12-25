<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update User</title>
</head>

<body>
    <div class="container-xl">
        <h1 class="mt-5">Update User</h1>
        <form action="{{ route('users1.update', $users1->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $users1->username }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $users1->email }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="Admin" {{ $users1->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{ $users1->role == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Moderator" {{ $users1->role == 'Moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><i class="material-icons">&#xE150;</i> Update</button>
            <a href="{{ route('users1.index') }}" class="btn btn-secondary"><i class="material-icons">&#xE14C;</i> Cancel</a>
        </form>
    </div>
</body>

</html>
