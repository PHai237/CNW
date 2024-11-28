<?php
include 'flowers.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newFlower = [
        "id" => uniqid(),
        "name" => htmlspecialchars($_POST['name']),
        "description" => htmlspecialchars($_POST['description']),
        "img" => htmlspecialchars($_POST['img'])
    ];
    $flowers[] = $newFlower;
    save($flowers);
    header('Location: index.php');
    exit;
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
