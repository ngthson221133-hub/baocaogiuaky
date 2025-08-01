<?php
// session_start(); // Đã gọi ở index.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo 'Bạn không có quyền truy cập trang này.';
    exit();
}

include_once 'model/orders.php';
include_once 'library/smarty/libs/Smarty.class.php';
$smarty = new \Smarty\Smarty;

$orders = new orders();
$message = '';

$actionName = $_GET['action'] ?? 'index';

if ($actionName == 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = array(
        'user_id' => $_POST['user_id'],
        'total' => $_POST['total'],
        'status' => $_POST['status']
    );
    global $db;
    $ok = $db->record_insert('orders', $data);
    $message = $ok ? 'Thêm đơn hàng thành công!' : 'Thêm thất bại!';
    header('Location: /itc_toi-main/index.php?controller=order&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $data = array(
        'user_id' => $_POST['user_id'],
        'total' => $_POST['total'],
        'status' => $_POST['status']
    );
    global $db;
    $ok = $db->record_update('orders', $data, "id = $id");
    $message = $ok ? 'Cập nhật thành công!' : 'Cập nhật thất bại!';
    header('Location: /itc_toi-main/index.php?controller=order&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    global $db;
    $ok = $db->record_delete('orders', "id = $id");
    $message = $ok ? 'Xóa thành công!' : 'Xóa thất bại!';
    header('Location: /itc_toi-main/index.php?controller=order&action=index&msg='.urlencode($message));
    exit();
} elseif ($actionName == 'export_excel') {
    require_once __DIR__ . '/../vendor/autoload.php';
    $list = $orders->list_all();
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'User ID');
    $sheet->setCellValue('C1', 'Tổng tiền');
    $sheet->setCellValue('D1', 'Trạng thái');
    $sheet->setCellValue('E1', 'Ngày tạo');
    $row = 2;
    foreach ($list as $order) {
        $sheet->setCellValue('A'.$row, $order['id']);
        $sheet->setCellValue('B'.$row, $order['user_id']);
        $sheet->setCellValue('C'.$row, $order['total']);
        $sheet->setCellValue('D'.$row, $order['status']);
        $sheet->setCellValue('E'.$row, $order['created_at']);
        $row++;
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="orders.xlsx"');
    header('Cache-Control: max-age=0');
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $writer->save('php://output');
    exit();
} elseif ($actionName == 'pending') {
    // Đơn hàng chờ xử lý
    global $db;
    $sql = "SELECT * FROM orders WHERE status = 'pending' ORDER BY id DESC";
    $list = $db->executeQuery_list($sql);
    $smarty->assign('orders', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    // KHÔNG gọi $smarty->display ở đây!
} else {
    $status = isset($_GET['status']) ? trim($_GET['status']) : '';
    $date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
    $date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';
    $user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : '';
    $where = [];
    if ($status !== '') $where[] = "status LIKE '%".addslashes($status)."%'";
    if ($date_from !== '') $where[] = "created_at >= '".addslashes($date_from)." 00:00:00'";
    if ($date_to !== '') $where[] = "created_at <= '".addslashes($date_to)." 23:59:59'";
    if ($user_id !== '') $where[] = "user_id = $user_id";
    $where_sql = count($where) ? 'WHERE '.implode(' AND ', $where) : '';
    global $db;
    $sql = "SELECT * FROM orders $where_sql ORDER BY id DESC";
    $list = $db->executeQuery_list($sql);
    $smarty->assign('orders', $list);
    $smarty->assign('message', $_GET['msg'] ?? '');
    $smarty->assign('status', $status);
    $smarty->assign('date_from', $date_from);
    $smarty->assign('date_to', $date_to);
    $smarty->assign('user_id', $user_id);
    // KHÔNG gọi $smarty->display ở đây!
} 