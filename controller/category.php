<?php
// session_start(); // Đã gọi ở index.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo 'Bạn không có quyền truy cập trang này.';
    exit();
}

include_once 'model/products.php';
include_once 'model/categories.php';
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$products = new products();
$categories = new categories();
$all_products = $products->list_all();
$all_categories = $categories->list_all();
$smarty->assign('products', $all_products);
$smarty->assign('categories', $all_categories);
$message = '';

$actionName = $_GET['action'] ?? 'index';

if ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description']
    );
    global $db;
    $ok = $db->record_insert('categories', $data);
    $message = $ok ? 'Thêm danh mục thành công!' : 'Thêm thất bại!';
    header('Location: /itc_toi-main/index.php?controller=category&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $data = array(
        'name' => $_POST['name'],
        'description' => $_POST['description']
    );
    global $db;
    $ok = $db->record_update('categories', $data, "id = $id");
    $message = $ok ? 'Cập nhật thành công!' : 'Cập nhật thất bại!';
    header('Location: /itc_toi-main/index.php?controller=category&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    global $db;
    $ok = $db->record_delete('categories', "id = $id");
    $message = $ok ? 'Xóa thành công!' : 'Xóa thất bại!';
    header('Location: /itc_toi-main/index.php?controller=category&action=index&msg='.urlencode($message));
    exit();
} else {
    $list = $categories->list_all();
    $smarty->assign('categories', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    // KHÔNG gọi $smarty->display ở đây!
} 