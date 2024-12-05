<?php
class Database {
    private static $connection;
    private static $error_message;

    public static function getErrorMessage() {
        return self::$error_message;
    }

    // Sử dụng PDO
    public static function getConnection() {
        if (!isset(self::$connection)) {
            try {
                // PDO
                $dsn = 'mysql:host=localhost;dbname=tintuc;charset=utf8';
                $username = 'MAGICA';
                $password = 'StoneMelon23';

                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                self::$error_message = "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
                return null;
            }
        }
        return self::$connection;
    }
}
?>