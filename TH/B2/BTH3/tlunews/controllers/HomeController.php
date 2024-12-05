<?php
require_once 'models/User.php';
require_once 'models/News.php';

class HomeController {
    private $userModel;
    private $newsModel;

    public function __construct() {
        $this->userModel = new User();
        $this->newsModel = new News();
    }

    // Kiểm tra quyền admin
    private function checkAdmin() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php?controller=Admin&action=login');
            exit();
        }
    }

    public function index() {
        $this->checkAdmin();

        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $newsList = $this->newsModel->search($searchTerm);
        } else {
            $newsList = $this->newsModel->getAll();
            require_once 'views/home/index.php';
        }
    }

    public function detail($id) {
        $this->checkAdmin();

        $newsDetail = $this->newsModel->getById($id);
        require_once 'views/home/detail.php';
    }
}
?>