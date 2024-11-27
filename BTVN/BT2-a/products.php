<?php
$products = [
    ["name" => "Sản phẩm 1", "price" => "1000 VND"],
    ["name" => "Sản phẩm 2", "price" => "2000 VND"],
    ["name" => "Sản phẩm 3", "price" => "3000 VND"]
];

function saveP($products) {
    $data = json_encode($products, JSON_UNESCAPED_UNICODE);
    if (file_put_contents('products.json', $data) === false) {
        echo "Không thể lưu dữ liệu vào file products.json!";
        return false;
    }
    return true;
}

function loadP() {
    if (file_exists('products.json')) {
        $content = file_get_contents('products.json');
        if ($content === false) {
            echo "Không thể đọc file products.json!";
            return [];
        }
        return json_decode($content, true);
    }
    return [];
}

if (!file_exists('products.json')) {
    saveP($products);
}

$products = loadP();
?>