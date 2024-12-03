<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<?php
$error_message = "";

if (!isset($_GET['index']) || !is_numeric($_GET['index'])) {
    $error_message = "Sản phẩm không hợp lệ!";
} else {
    $index = (int) $_GET['index'];

    if (!isset($products[$index])) {
        $error_message = "Sản phẩm không tồn tại!";
    } else {
        $current_product = $products[$index];
        $current_name = $current_product['name'];
        $current_price = str_replace(" VND", "", $current_product['price']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $new_name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $new_price = htmlspecialchars(trim($_POST['price'] ?? ''));

    if (!empty($new_name) && !empty($new_price)) {
        foreach ($products as $i => $product) {
            if ($i !== $index && strtolower($product['name']) === strtolower($new_name)) {
                $error_message = "Sản phẩm '$new_name' đã tồn tại. Vui lòng nhập tên sản phẩm khác!";
                break;
            }
        }

        if (empty($error_message)) {
            $products[$index]['name'] = $new_name;
            $products[$index]['price'] = $new_price . ' VND';
            save($products);
            header("Location: index.php");
            exit();
        }
    }
}
?>

<main>
    <h2>Sửa Sản Phẩm</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error-message">
            <?= $error_message ?>
        </div>
    <?php endif; ?>

    <form method="post" class="edit-product">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($new_name ?? $current_name ?? '') ?>" required>
        <br>
        <label for="price">Giá thành:</label>
        <input type="text" name="price" id="price" value="<?= htmlspecialchars($new_price ?? $current_price ?? '') ?>" required>
        <br>
        <button type="submit" name="edit" class="submit-btn">Sửa sản phẩm</button>
    </form>
</main>

<style>
    main {
        width: 50%;
        margin: 50px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .edit-product {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .edit-product label {
        font-size: 16px;
        color: #333;
    }

    .edit-product input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .edit-product input:focus {
        border-color: #007bff;
        outline: none;
    }

    .submit-btn {
        padding: 10px 15px;
        background-color: #ffc107;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-btn:hover {
        background-color: #e0a800;
    }

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

<?php include 'footer.php'; ?>
