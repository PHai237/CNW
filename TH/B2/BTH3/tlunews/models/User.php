<?php
require_once 'models/Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Check login
    public function login($username, $password) {
        if ($this->db === null) {
            return null;
        }

        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = :password AND role = 1");
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>