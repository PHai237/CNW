<?php
require_once 'models/News.php';

class NewsController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    public function index() {
        $newsList = $this->newsModel->getAll();
        require_once 'views/admin/news/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            if ($this->newsModel->add($title, $content, $image, $category_id)) {
                header('Location: index.php?controller=News&action=index');
            } else {
                $error_message = "Không thể thêm tin tức!";
                require_once 'views/admin/news/add.php';
            }
        } else {
            require_once 'views/admin/news/add.php';
        }
    }

    public function edit($id) {
        $news = $this->newsModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];

            if ($this->newsModel->update($id, $title, $content, $image, $category_id)) {
                header('Location: index.php?controller=News&action=index');
            } else {
                $error_message = "Không thể sửa tin tức!";
                require_once 'views/admin/news/edit.php';
            }
        } else {
            require_once 'views/admin/news/edit.php';
        }
    }

    public function delete($id) {
        if ($this->newsModel->delete($id)) {
            header('Location: index.php?controller=News&action=index');
        } else {
            $error_message = "Không thể xóa tin tức!";
            header('Location: index.php?controller=News&action=index');
        }
    }
}
?>