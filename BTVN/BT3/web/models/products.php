<?php
class Product {
    private static $path = __DIR__ . '/../../storage/products.json';

    private static $products = [
        ["name" => "Sản phẩm 1", "price" => "1000 VND"],
        ["name" => "Sản phẩm 2", "price" => "2000 VND"],
        ["name" => "Sản phẩm 3", "price" => "3000 VND"],
    ];

    public static function load(&$error_message = '') {
        if (file_exists(self::$path)) {
            $data = file_get_contents(self::$path);
            return json_decode($data, true) ?? [];
        }
        $error_message = "File sản phẩm không tồn tại, đang sử dụng dữ liệu mặc định!";
        return self::$products;
    }

    public static function save($products, &$error_message = '') {
        if (file_put_contents(self::$path, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
            $error_message = "Không thể lưu dữ liệu vào file products.json!";
            return false;
        }
        return true;
    }

    public static function delete($index, &$error_message = '') {
        $products = self::load($error_message);
        if ($error_message) {
            return false;
        }

        if (isset($products[$index])) {
            array_splice($products, $index, 1);
            return self::save($products, $error_message);
        }

        $error_message = "Sản phẩm không tồn tại!";
        return false;
    }
}
?>