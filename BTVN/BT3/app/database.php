<?php
class Database {
    const HOST = 'localhost';
    const DB_NAME = 'product_db';
    const USERNAME = 'MAGICA';
    const PASSWORD = 'StoneMelon23';

    public static function getConnection() {
        try {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME;
            $connection = new PDO($dsn, self::USERNAME, self::PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "Kết nối cơ sở dữ liệu thất bại: " . $e->getMessage();
            exit;
        }
    }
}
