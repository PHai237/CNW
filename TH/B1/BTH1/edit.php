<?php
include 'db.php';

// Lấy thông tin hoa để chỉnh sửa
$flowerToEdit = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $flowerToEdit = $result->fetch_assoc();
    } else {
        echo "Hoa không tồn tại!";
        exit;
    }
} else {
    echo "ID hoa không hợp lệ!";
    exit;
}

// Cập nhật hoa trong cơ sở dữ liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $img = htmlspecialchars($_POST['img']);

    $sql = "UPDATE flowers SET name = '$name', description = '$description', image = '$img' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Quay về trang danh sách sau khi cập nhật
        exit();
    } else {
        echo "Lỗi khi cập nhật hoa: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Hoa</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
        }

        input, textarea {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #6b8e23;
            color: white;
            font-size: 18px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4e5b23;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Sửa Hoa</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($flowerToEdit['id']); ?>">

        <label for="name">Tên Hoa:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($flowerToEdit['name']); ?>" required>

        <label for="description">Mô Tả:</label>
        <textarea id="description" name="description" required><?= htmlspecialchars($flowerToEdit['description']); ?></textarea>

        <label for="img">Link Ảnh:</label>
        <input type="text" id="img" name="img" value="<?= htmlspecialchars($flowerToEdit['image']); ?>" required>

        <button type="submit">Cập Nhật</button>
    </form>
</body>
</html>
