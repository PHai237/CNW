<?php
require_once 'models/User.php';

class AdminController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        require_once 'views/admin/login.php';
    }

    public function doLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->userModel->login($username, $password);

            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin['id'];
                header('Location: index.php?controller=Admin&action=dashboard');
            } else {
                $error_message = "Tên đăng nhập hoặc mật khẩu không chính xác!";
                require_once 'views/admin/login.php';
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=Admin&action=login');
    }
}
?>