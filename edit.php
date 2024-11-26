<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<?php
// Đây là code sử dụng products.db
/*
$error_message = "";

if (!isset($_GET['index']) || !is_numeric($_GET['index'])) {
    $error_message = "Sản phẩm không hợp lệ!";
} else {
    $index = (int) $_GET['index'];

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute([':id' => $index + 1]);
    $current_product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$current_product) {
        $error_message = "Sản phẩm không tồn tại!";
    } else {
        $current_name = $current_product['name'];
        $current_price = str_replace(" VND", "", $current_product['price']);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $new_name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $new_price = htmlspecialchars(trim($_POST['price'] ?? ''));

    if (!empty($new_name) && !empty($new_price)) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE LOWER(name) = LOWER(:name) AND id != :id");
        $stmt->execute(['name' => $new_name, ':id' => $index + 1]);
        $exists = $stmt->fetchColumn();

        if ($exists) {
            $error_message = "Sản phẩm '$new_name' đã tồn tại. Vui lòng nhập tên sản phẩm khác!";
        } else {
            $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
            $success = $stmt->execute([
                ':name' => $new_name,
                ':price' => $new_price . ' VND',
                ':id' => $index + 1
            ]);

            if ($success) {
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Có lỗi xảy ra khi sửa sản phẩm!";
            }
        }
    } else {
        $error_message = "Vui lòng điền đầy đủ thông tin!";
    }
}
*/

// Đây là code sử dụng products.json
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
    } else {
        $error_message = "Vui lòng điền đầy đủ thông tin!";
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

    <form method="post" class="product-form">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($new_name ?? $current_name ?? '') ?>" required>
        <br>
        <label for="price">Giá thành:</label>
        <input type="text" name="price" id="price" value="<?= htmlspecialchars($new_price ?? $current_price ?? '') ?>" required>
        <br>
        <button type="submit" name="edit" class="btn-submit">Sửa sản phẩm</button>
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

    .product-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .product-form label {
        font-size: 16px;
        color: #333;
    }

    .product-form input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .product-form input:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-submit {
        padding: 10px 15px;
        background-color: #ffc107;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .btn-submit:hover {
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
