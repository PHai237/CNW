<?php
require_once __DIR__ . '../../models/User.php';

class AdminController {
    // Hàm xử lý đăng nhập
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByUsername($username);

            if ($user) {
                if ($password == $user['password']) {
                    session_start();
                    $_SESSION['user'] = $user;

                    if ($user['role'] == 1) {
                        // Nếu là admin, chuyển hướng đến trang quản lý admin
                        header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/admin/dashboard.php");
                    } else {
                        // Nếu là user, chuyển hướng đến trang chủ của user
                        header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/home/index.php");
                    }
                    exit;
                } else {
                    $error = "Sai mật khẩu!";
                }
            } else {
                $error = "Tài khoản không tồn tại!";
            }
        }

        require 'views/admin/login.php';
    }
}
?>
