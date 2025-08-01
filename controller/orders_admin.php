<?php
include_once 'model/orders.php';
include_once 'model/order_items.php';

class orders_adminController {
    
    public function indexAction($smarty) {
        // Kiểm tra quyền admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /itc_toi-main/index.php?controller=admin&action=login");
            exit();
        }
        
        $orders = new orders();
        
        // Lọc theo trạng thái
        $status_filter = $_GET['status'] ?? '';
        if ($status_filter) {
            $all_orders = $orders->get_orders_by_status($status_filter);
        } else {
            $all_orders = $orders->get_all_orders();
        }
        
        // Thống kê
        $stats = $orders->get_order_statistics();
        
        $smarty->assign('orders', $all_orders);
        $smarty->assign('stats', $stats);
        $smarty->assign('status_filter', $status_filter);
        $smarty->assign('mainContent', 'orders_admin/index.tpl');
    }
    
    public function viewAction($smarty) {
        // Kiểm tra quyền admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header("Location: /itc_toi-main/index.php?controller=admin&action=login");
            exit();
        }
        
        $order_id = $_GET['id'] ?? 0;
        if (!$order_id) {
            header("Location: /itc_toi-main/index.php?controller=orders_admin&action=index");
            exit();
        }
        
        $orders = new orders();
        $order_items = new order_items();
        
        $order = $orders->get_order_by_id($order_id);
        $items = $order_items->get_order_items($order_id);
        
        if (!$order) {
            header("Location: /itc_toi-main/index.php?controller=orders_admin&action=index");
            exit();
        }
        
        $smarty->assign('order', $order);
        $smarty->assign('items', $items);
        $smarty->assign('mainContent', 'orders_admin/view.tpl');
    }
    
    public function updateStatusAction($smarty) {
        // Kiểm tra quyền admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Không có quyền truy cập']);
            return;
        }
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ']);
            return;
        }
        
        $order_id = $_POST['order_id'] ?? 0;
        $status = $_POST['status'] ?? '';
        
        if (!$order_id || !$status) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin']);
            return;
        }
        
        $orders = new orders();
        $result = $orders->update_order_status($order_id, $status);
        
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật']);
        }
    }
}
?> 