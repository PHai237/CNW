<?php
require_once dirname(__DIR__) . '/database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($products) {
        if (file_put_contents('products.json', json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) === false) {
            echo "Không thể lưu dữ liệu vào file products.json!";
        }
    }

    public function load() {
        if (file_exists('products.json')) {
            $data = file_get_contents('products.json');
            if ($data === false) {
                echo "Không thể đọc file products.json!";
            }
            return json_decode($data, true);
        }
        return [];
    }

    public function create($name, $price) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
        return $stmt->execute([':name' => $name, ':price' => $price]);
    }

    public function update($id, $name, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
        return $stmt->execute([':name' => $name, ':price' => $price, ':id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
