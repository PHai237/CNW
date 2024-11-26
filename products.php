<?php
$products = [
    ["name" => "Sản phẩm 1", "price" => "1000 VND"],
    ["name" => "Sản phẩm 2", "price" => "2000 VND"],
    ["name" => "Sản phẩm 3", "price" => "3000 VND"],
];

function save($products) {
    file_put_contents('products.json', json_encode($products,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function load() {
    if(file_exists('products.json')) {
        return json_decode(file_get_contents('products.json'), true);
    }
    return [];
}

if (!file_exists('products.json')) {
    save($products);
}

$products = load();
?>