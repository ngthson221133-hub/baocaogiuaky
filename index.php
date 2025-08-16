<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

include_once 'config.php';
include_once 'model/model.php';

include_once 'model/cart.php';
include_once 'model/categories.php';
include_once 'model/images.php';
include_once 'model/orders.php';
include_once 'model/products.php';
include_once 'model/promotions.php';
include_once 'model/users.php';

//Gọi template engine Smarty
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 0;

// Routing mới: controller & action
$controllerName = $_GET['controller'] ?? ($_GET['c'] ?? 'home');
$actionName = $_GET['action'] ?? ($_GET['v'] ?? 'index');

$controllerFile = 'controller/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    include_once $controllerFile;
    
    // Tạo instance của controller class hoặc gọi function
    $controllerClass = $controllerName . 'Controller';
    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        $actionFunction = $actionName . 'Action';
        if (method_exists($controller, $actionFunction)) {
            $controller->$actionFunction($smarty);
        }
    } else {
        // Fallback cho các controller sử dụng function (như home.php)
        $actionFunction = $actionName . 'Action';
        if (function_exists($actionFunction)) {
            $actionFunction($smarty);
        }
    }
    
    // Debug: Kiểm tra action
    error_log("Controller: $controllerName, Action: $actionName");
} else {
    echo 'Controller not found!';
    exit();
}

// Chỉ render template nếu không phải là request xử lý logic (ví dụ: POST login, redirect, ...)
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $actionName === 'login') {
    // Kiểm tra xem có mainContent được assign không
    $mainContent = $smarty->getTemplateVars('mainContent');
    if ($mainContent && file_exists('templates/' . $mainContent)) {
        $smarty->display('templates/' . $mainContent);
    } else {
        $templatePath = 'templates/' . $controllerName . '/' . $actionName . '.tpl';
        if (file_exists($templatePath)) {
            $smarty->display($templatePath);
        } else {
            // Nếu không tìm thấy template, hiển thị lỗi
            echo 'Template not found: ' . $templatePath;
        }
    }
}