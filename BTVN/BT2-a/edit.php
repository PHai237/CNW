<?php include 'products.php'; ?>

<?php
$error_message = "";

if (!isset($_GET['index']) || !is_numeric($_GET['index'])) {
    $error_message = "Invalid product!";
} else {
    $index = (int) $_GET['index'];

    if (!isset($products[$index])) {
        $error_message = "The product does not exist!";
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
                $error_message = "The product '$new_name' already exists. Please choose a different name!";
                break;
            }
        }

        if (empty($error_message)) {
            $products[$index]['name'] = $new_name;
            $products[$index]['price'] = $new_price . ' VND';
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
        <h2>Edit Product</h2>

        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?= $error_message ?>
            </div>
        <?php endif; ?>

        <form method="post" class="edit">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($new_name ?? $current_name ?? '') ?>" required>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="<?= htmlspecialchars($new_price ?? $current_price ?? '') ?>" required>
            <button type="submit" name="edit" class="submit-btn">Update Product</button>
        </form>
    </div>
</main>

<style>
    body {
        font-family: "Georgia", serif;
        background: linear-gradient(135deg, #4b2e16, #2e1a0f);
        color: #f4e3c1;
        margin: 0;
        padding: 0;
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

    .edit {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .edit label {
        font-size: 16px;
        font-weight: bold;
        color: #4b2e16;
    }

    .edit input {
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .edit input:focus {
        border-color: #7a5230;
        outline: none;
        box-shadow: 0 0 5px rgba(122, 82, 48, 0.8);
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #ffc107;
        color: white;
        border: 2px solid #3d5221;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #e0a800;
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