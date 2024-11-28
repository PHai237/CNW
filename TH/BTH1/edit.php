<?php
include 'flowers.php';

$flowerToEdit = null;

// Lấy flower_id từ query string
if (isset($_GET['flower_id'])) {
    $flower_id = $_GET['flower_id'];

    // Tìm hoa trong mảng dựa trên ID
    foreach ($flowers as $flower) {
        if ($flower['id'] === $flower_id) {
            $flowerToEdit = $flower;
            break;
        }
    }
}

if (!$flowerToEdit) {
    echo "Hoa không tồn tại!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cập nhật thông tin hoa
    $flowerToEdit['name'] = htmlspecialchars($_POST['name']);
    $flowerToEdit['description'] = htmlspecialchars($_POST['description']);
    $flowerToEdit['img'] = htmlspecialchars($_POST['img']);

    // Lưu thay đổi vào danh sách
    foreach ($flowers as &$flower) {
        if ($flower['id'] === $flowerToEdit['id']) {
            $flower = $flowerToEdit;
            break;
        }
    }

    save($flowers);
    header('Location: index.php'); // Chuyển về trang danh sách
    exit;
}
?>

<h2>Sửa Hoa</h2>
<form method="POST">
    <input type="hidden" name="flower_id" value="<?= $flowerToEdit['id']; ?>">

    <label for="name">Tên Hoa:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($flowerToEdit['name']); ?>" required>

    <label for="description">Mô Tả:</label>
    <textarea id="description" name="description" required><?= htmlspecialchars($flowerToEdit['description']); ?></textarea>

    <label for="img">Link Ảnh:</label>
    <input type="text" id="img" name="img" value="<?= htmlspecialchars($flowerToEdit['img']); ?>" required>

    <button type="submit">Cập Nhật</button>
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
