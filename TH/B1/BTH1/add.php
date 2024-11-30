<?php
include 'flowers.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và bảo mật
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $img = htmlspecialchars($_POST['img']);

    // Insert dữ liệu vào cơ sở dữ liệu
    $query = "INSERT INTO flower_view (name, description, img) VALUES ('$name', '$description', '$img')";

    if (mysqli_query($conn, $query)) {
        // Thêm vào mảng hoa và lưu lại
        $newFlower = [
            "id" => uniqid(),
            "name" => $name,
            "description" => $description,
            "img" => $img
        ];
        $flowers[] = $newFlower;
        save($flowers); // Giả sử đây là một hàm để lưu vào mảng hoặc tệp
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Tên hoa" required>
    <textarea name="description" placeholder="Mô tả" required></textarea>
    <input type="text" name="img" placeholder="Link ảnh" required>
    <button type="submit">Thêm hoa</button>
</form>

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
    }

    button {
        background-color: #6b8e23;
        color: white;
        font-size: 18px;
        padding: 10px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #4e5b23;
    }
</style>
