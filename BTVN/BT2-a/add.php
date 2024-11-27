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
                $error_message = "The product '$name' already exists. Please enter a different product!";
                break;
            }
        }

        if (empty($error_message)) {
            $price .= ' VND';
            $products[] = ["name" => $name, "price" => $price];
            saveP($products);
            header("Location: index.php");
            exit();
        }
    } else {
        $error_message = "Please fill in all product information!";
    }
}
?>

<main>
    <div class="container">
        <h2>Add New Product</h2>

        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?= $error_message ?>
            </div>
        <?php endif; ?>

        <form method="post" class="add">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" placeholder="Nhập tên sản phẩm" required>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" placeholder="Nhập giá sản phẩm" required>
            <button type="submit" name="add" class="submit-btn">Add Product</button>
        </form>
    </div>
</main>

<style>
    body {
        background: linear-gradient(135deg, #4b2e16, #2e1a0f);
        font-family: "Georgia", serif;
        color: #f4e3c1;
    }

    main {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
    }

    .container {
        width: 50%;
        background: rgba(255, 255, 255, 0.9);
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.6);
        border: 3px solid #7a5230;
    }

    h2 {
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
        color: #4b2e16;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
    }

    .add {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .add label {
        font-size: 16px;
        font-weight: bold;
        color: #4b2e16;
    }

    .add input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .add input:focus {
        border-color: #7a5230;
        outline: none;
        box-shadow: 0 0 5px rgba(122, 82, 48, 0.8);
    }

    .submit-btn {
        padding: 10px 20px;
        background: linear-gradient(135deg, #6b8e23, #556b2f);
        color: white;
        border: 2px solid #3d5221;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .submit-btn:hover {
        background: linear-gradient(135deg, #556b2f, #3d5221);
    }

    .error-message {
        margin-bottom: 20px;
        color: #dc3545;
        background: rgba(220, 53, 69, 0.1);
        padding: 10px;
        border: 1px solid #dc3545;
        border-radius: 5px;
        text-align: center;
        font-size: 14px;
    }
</style>

<?php include 'footer.php'; ?>
