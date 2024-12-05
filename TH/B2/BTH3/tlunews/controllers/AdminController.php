<?php
require_once __DIR__ . '../../models/User.php';

class AdminController {
    public function login() {
        session_start();
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if ($user['role'] == 1) {
                header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/admin/dashboard.php");
            } else {
                header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/home/index.php");
            }
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByUsername($username);

            if ($user) {
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

    // Hàm xử lý đăng xuất
    public function logout() {
        session_start();
        if (isset($_SESSION['user'])) {
            session_unset();
            session_destroy();
            session_regenerate_id(true);
        }

        header("Location: /Tlus_Music_Garden/CNW/TH/B2/BTH3/tlunews/views/admin/login.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $adminController = new AdminController();
    $adminController->logout();
}
?>
