<?php
require_once 'config/database.php';

class User {
    private $conn;
    private $table = 'users';

    // Khởi tạo kết nối cơ sở dữ liệu
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Lấy thông tin người dùng từ database theo username
    public function getUserByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
