<?php
require_once '../web/controllers/actions.php';

$controller = new Actions();
$action = $_GET['action'] ?? 'index';
$index = $_GET['index'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    case 'edit':
        if ($index !== null) $controller->edit((int) $index);
        break;
    case 'delete':
        if ($index !== null) $controller->delete((int) $index);
        break;
}
?>