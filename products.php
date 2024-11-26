<?php
$products = [
    ["name" => "Sản phẩm 1", "price" => "1000 VND"],
    ["name" => "Sản phẩm 2", "price" => "2000 VND"],
    ["name" => "Sản phẩm 3", "price" => "3000 VND"],
];

function save($products) {
    if (file_put_contents('products.json', json_encode($products,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
        die("Không thể lưu dữ liệu vào file products.json!");
    }
}

function load() {
    if(file_exists('products.json')) {
        $data = file_get_contents('products.json');
        if ($data === false) {
            die("Không thể đọc file products.json!");
        }
        return json_decode(file_get_contents('products.json'), true);
    }
    return [];
}

if (!file_exists('products.json')) {
    save($products);
}

$products = load();
?>