<?php
// session_start(); // Đã gọi ở index.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo 'Bạn không có quyền truy cập trang này.';
    exit();
}

include_once 'model/reviews.php';
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$reviews = new reviews();
$message = '';

$actionName = $_GET['action'] ?? 'index';

if ($actionName == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    global $db;
    $ok = $db->record_delete('reviews', "id = $id");
    $message = $ok ? 'Xóa đánh giá thành công!' : 'Xóa thất bại!';
    header('Location: /itc_toi-main/index.php?controller=review&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'reply' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $reply = $_POST['reply'];
    global $db;
    $ok = $db->record_update('reviews', array('reply'=>$reply), "id = $id");
    $message = $ok ? 'Trả lời thành công!' : 'Trả lời thất bại!';
    header('Location: /itc_toi-main/index.php?controller=review&action=index&msg='.urlencode($message));
    exit();
} else {
    $list = $reviews->list_all();
    $smarty->assign('reviews', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    // KHÔNG gọi $smarty->display ở đây!
} 