<?php
require_once __DIR__ . '../../models/User.php';

class AdminController {
    // Hàm xử lý đăng nhập
    public function login() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByUsername($username);

            if ($user) {
                // Kiểm tra mật khẩu
                if ($password == $user['password']) {
                    $_SESSION['user'] = $user;

                    // Điều hướng đến trang quản lý admin hoặc trang chủ của user
                    if ($user['role'] == 1) {
                        header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/admin/dashboard.php");
                    } else {
                        header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/home/index.php");
                    }
                    exit;
                } else {
                    $_SESSION['error'] = "Sai mật khẩu!";
                }
            } else {
                $_SESSION['error'] = "Tài khoản không tồn tại!";
            }
        }

        require 'views/admin/login.php';
    }
}
?>
