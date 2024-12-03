<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<?php
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);

    if (!empty($name) && !empty($price)) {
        foreach ($products as $product) {
            if (strtolower($product['name']) === strtolower($name)) {
                $error_message = "Sản phẩm '$name' đã tồn tại. Vui lòng nhập sản phẩm khác!";
                break;
            }
        }

        if (empty($error_message)) {
            $price .= ' VND';
            $products[] = ["name" => $name, "price" => $price];
            save($products);
            header("Location: index.php");
            exit();
        }
    }
}
?>

<main>
    <h2>Thêm sản phẩm mới</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error-message">
            <?= $error_message ?>
        </div>
    <?php endif; ?>

    <form method="post" class="add-product">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" required>
        <br>
        <label for="price">Giá thành:</label>
        <input type="text" name="price" id="price" placeholder="Nhập giá sản phẩm" required>
        <br>
        <button type="submit" name="add" class="submit-btn">Thêm sản phẩm</button>
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
        text-align: center;
        font-size: 30px;
        color: #333;
        margin: 10px 0 30px;
    }

    .add-product {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .add-product label {
        font-size: 16px;
        color: #333;
    }

    .add-product input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .add-product input:focus {
        border-color: #007bff;
        outline: none;
    }

    .submit-btn {
        padding: 10px 15px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-btn:hover {
        background-color: #218838;
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