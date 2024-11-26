<?php
include 'products.php';

$error_message = "";

if (isset($_POST['index']) && is_numeric($_POST['index'])) {
    $index = (int) $_POST['index'];

    if (isset($products[$index])) {
        array_splice($products, $index, 1);
        save($products);
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Sản phẩm không tồn tại!";
    }
} else {
    $error_message = "Thông tin xóa sản phẩm không hợp lệ!";
}
?>

<main>
    <h2>Xóa sản phẩm</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error-message">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
</main>

<style>
    .error-message {
        margin-bottom: 20px;
        color: #dc3545;
        background: #f8d7da;
        padding: 10px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        text-align: center;
    }
</style>