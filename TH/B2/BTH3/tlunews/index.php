<?php
// Gọi controller để xử lý đăng nhập
require_once __DIR__ . '../../tlunews/controllers/AdminController.php';

$adminController = new AdminController();
$adminController->login();  // Gọi hàm login trong AdminController để xử lý đăng nhập
?>
