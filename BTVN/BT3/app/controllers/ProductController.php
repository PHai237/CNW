<?php
require_once dirname(__DIR__) . '/models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAll();
        require dirname(__DIR__) . '/views/products/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);

            if (!empty($name) && !empty($price)) {
                $price .= ' VND';
                $this->productModel->create($name, $price);
                header("Location: index.php?controller=Product&action=index");
                exit();
            }
        }
        require dirname(__DIR__) . '/views/products/add.php';
    }

    public function edit() {
        $error_message = "";

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $error_message = "Sản phẩm không hợp lệ!";
        } else {
            $id = (int)$_GET['id'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
                $new_name = htmlspecialchars(trim($_POST['name'] ?? ''));
                $new_price = htmlspecialchars(trim($_POST['price'] ?? ''));

                if (!empty($new_name) && !empty($new_price)) {
                    $this->productModel->update($id, $new_name, $new_price . ' VND');
                    header("Location: index.php?controller=Product&action=index");
                    exit();
                }
            } else {
                $product = $this->productModel->getById($id);
                if (!$product) {
                    $error_message = "Sản phẩm không tồn tại!";
                } else {
                    $current_name = $product['name'];
                    $current_price = str_replace(" VND", "", $product['price']);
                }
            }
        }
        require dirname(__DIR__) . '/views/products/edit.php';
    }

    public function delete() {
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $id = (int)$_POST['id'];
            $this->productModel->delete($id);
            header("Location: index.php?controller=Product&action=index");
            exit();
        }
    }
}
