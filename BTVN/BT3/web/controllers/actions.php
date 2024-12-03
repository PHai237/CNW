<?php
require_once '../models/products.php';

class Actions {
    public function index() {
        $error_message = '';
        $products = Product::load($error_message);
        if ($error_message) {
            echo "<p style = 'color: red'>Lỗi: $error_message</p>";
        }
        require '../views/layout.php';
    }

    public function add() {
        $error_message = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']) . ' VND';

            $products = Product::load($error_message);
            if ($error_message) {
                echo "<p style='color: red;'>Lỗi: $error_message</p>";
                require '../views/add.php';
                return;
            }

            foreach ($products as $product) {
                if (strtolower($product['name']) === strtolower($name)) {
                    $error_message = "Sản phẩm '$name' đã tồn tại!";
                    require '../views/add.php';
                    return;
                }
            }

            $products[] = ['name' => $name, 'price' => $price];
            $save = Product::save($products, $error_message);

            if (!$save) {
                echo "<p style='color: red;'>Lỗi: $error_message</p>";
            } else {
                header("Location: index.php");
                exit();
            }
        }
        require '../views/add.php';
    }

    public function edit() {
        $error_message = '';
        if (!isset($_GET['index']) || !is_numeric($_GET['index'])) {
            $error_message = "Sản phẩm không hợp lệ!";
            echo "<p style='color: red;'>Lỗi: $error_message</p>";
            return;
        }

        $index = (int) $_GET['index'];
        $products = Product::load($error_message);

        if ($error_message) {
            echo "<p style='color: red;'>Lỗi: $error_message</p>";
            return;
        }

        if (!isset($products[$index])) {
            $error_message = "Sản phẩm không tồn tại!";
            echo "<p style='color: red;'>Lỗi: $error_message</p>";
            return;
        }

        $current_product = $products[$index];
        $current_name = $current_product['name'];
        $current_price = str_replace(' VND', '', $current_product['price']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_name = htmlspecialchars($_POST['name']);
            $new_price = htmlspecialchars($_POST['price']) . ' VND';

            $products[$index]['name'] = $new_name;
            $products[$index]['price'] = $new_price;
            $save = Product::save($products, $error_message);

            if (!$save) {
                echo "<p style='color: red;'>Lỗi: $error_message</p>";
            } else {
                header("Location: index.php");
                exit();
            }
        }

        require '../views/edit.php';
    }

    public function delete($index) {
        $error_message = '';
        $delete = Product::delete($index, $error_message);

        if ($error_message) {
            echo "<p style='color: red;'>Lỗi: $error_message</p>";
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
?>