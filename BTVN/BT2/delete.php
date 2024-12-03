<?php
include 'products.php';

if (isset($_POST['index']) && is_numeric($_POST['index'])) {
    $index = (int) $_POST['index'];

    if (isset($products[$index])) {
        array_splice($products, $index, 1);
        save($products);
        header("Location: index.php");
        exit();
    }
}
?>