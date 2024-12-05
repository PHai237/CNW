<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

echo "Controller: $controller, Action: $action";

$controllerFile = "controllers/{$controller}Controller.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;

    $controllerClass = "{$controller}Controller";
    $controllerObject = new $controllerClass();

    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        echo "Action không tồn tại.";
    }
} else {
    echo "Controller không tồn tại.";
}
