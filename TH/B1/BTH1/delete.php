<?php
include 'flowers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lọc ra hoa có ID khác với ID hoa cần xóa
    $flowers = array_filter($flowers, function($flower) {
        return $flower['id'] !== $_POST['flower_id'];
    });

    save($flowers);
    header('Location: index.php'); // Chuyển hướng về trang danh sách hoa
    exit;
}
?>

<form method="POST">
    <input type="hidden" name="flower_id" value="<?= $_GET['flower_id']; ?>">
    <button type="submit">Xóa hoa</button>
</form>

<style>
    form {
        text-align: center;
    }

    button {
        background-color: #d32f2f;
        color: white;
        font-size: 18px;
        padding: 10px;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #b71c1c;
    }
</style>
