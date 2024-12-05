<?php
class Database {
    private $host = "localhost";
    private $db_name = "tintuc";
    private $username = "MAGICA";
    private $password = "StoneMelon23";
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function connect() {
        $this->conn = null;

        try {
            // Cấu hình PDO với MySQL
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Thiết lập chế độ lỗi cho PDO
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
