<?php
// Đây là code sử dụng products.db
$products = [
    ["name" => "Sản phẩm 1", "price" => "1000 VND"],
    ["name" => "Sản phẩm 2", "price" => "2000 VND"],
    ["name" => "Sản phẩm 3", "price" => "3000 VND"],
];

$pdo = new PDO('sqlite:products.db');

$pdo->exec('
    CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price TEXT NOT NULL
    )
');

$error_message = "";

function save($products) {
    global $pdo, $error_message;

    $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");

    foreach ($products as $product) {
        if ($stmt->execute([
            ':name' => $product['name'],
            ':price' => $product['price']
        ])) {
            $error_message = "Không thể lưu sản phẩm: " . $product['name'];
            return false;
        }
    }

    return true;
}

function load() {
    global $pdo, $error_message;

    $stmt = $pdo->query("SELECT * FROM products");
    if ($stmt === false) {
        $error_message = "Không thể tải dữ liệu từ CSDL";
        return [];
    }

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$products = load();
if (!empty($error_message)) {
    echo "<div style='color: red; text-align: center;'>$error_message</div>";
}

// Đây là code sử dụng products.json
/*
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
*/
?>