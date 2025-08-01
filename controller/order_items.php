<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo 'Bạn không có quyền truy cập trang này.';
    exit();
}

include_once 'model/order_items.php';
include_once 'model/products.php';
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$order_id = isset($_GET['order_id']) ? intval($_GET['order_id']) : 0;
if ($order_id <= 0) {
    echo 'Thiếu order_id!';
    exit();
}

$order_items = new order_items();
$products = new products();
$message = '';

if ($v == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array(
        'order_id' => $order_id,
        'product_id' => $_POST['product_id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'quantity' => $_POST['quantity']
    );
    global $db;
    $ok = $db->record_insert('order_items', $data);
    $message = $ok ? 'Thêm sản phẩm vào đơn thành công!' : 'Thêm thất bại!';
    header('Location: /?c=order_items&v=index&order_id='.$order_id.'&msg='.urlencode($message));
    exit();
} elseif ($v == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $data = array(
        'product_id' => $_POST['product_id'],
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'quantity' => $_POST['quantity']
    );
    global $db;
    $ok = $db->record_update('order_items', $data, "id = $id");
    $message = $ok ? 'Cập nhật thành công!' : 'Cập nhật thất bại!';
    header('Location: /?c=order_items&v=index&order_id='.$order_id.'&msg='.urlencode($message));
    exit();
} elseif ($v == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    global $db;
    $ok = $db->record_delete('order_items', "id = $id");
    $message = $ok ? 'Xóa thành công!' : 'Xóa thất bại!';
    header('Location: /?c=order_items&v=index&order_id='.$order_id.'&msg='.urlencode($message));
    exit();
} else {
    $list = $order_items->list_all(0, 0, '', "order_id = $order_id");
    $all_products = $products->list_all();
    $smarty->assign('order_items', $list);
    $smarty->assign('products', $all_products);
    $smarty->assign('order_id', $order_id);
    $smarty->assign('message', $_GET['msg'] ?? '');
    $smarty->display('templates/order_items/index.tpl');
} 