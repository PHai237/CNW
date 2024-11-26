<?php include 'header.php'; ?>
<?php include 'products.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);

    if (!empty($name) && !empty($price)) {
        $price .= ' VND';
        $products[] = ["name" => $name, "price" => $price];
        save($products);
        header("Location: index.php");
        exit();
    }
}
?>

<main>
    <h2>Thêm sản phẩm mói</h2>
    <form method="post">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Giá thành:</label>
        <input type="text" name="price" id="price" required>
        <br>
        <button type="submit" name="add">Thêm sản phẩm</button>
    </form>
</main>

<?php include 'footer.php'; ?>