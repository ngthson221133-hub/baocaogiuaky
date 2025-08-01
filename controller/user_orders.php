<?php
include_once 'model/orders.php';
include_once 'model/order_items.php';

class user_ordersController {
    
    public function indexAction($smarty) {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header("Location: /itc_toi-main/index.php?controller=user&action=login");
            exit();
        }
        
        $orders = new orders();
        $user_id = $_SESSION['user_id'];
        
        // Lấy danh sách đơn hàng của user
        $user_orders = $orders->get_orders_by_user($user_id);
        
        $smarty->assign('orders', $user_orders);
        $smarty->assign('mainContent', 'user_orders/index.tpl');
    }
    
    public function viewAction($smarty) {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            header("Location: /itc_toi-main/index.php?controller=user&action=login");
            exit();
        }
        
        $order_id = $_GET['id'] ?? 0;
        if (!$order_id) {
            header("Location: /itc_toi-main/index.php?controller=user_orders&action=index");
            exit();
        }
        
        $orders = new orders();
        $order_items = new order_items();
        
        // Lấy thông tin đơn hàng
        $order = $orders->get_order_by_id($order_id);
        
        // Kiểm tra xem đơn hàng có thuộc về user này không
        if (!$order || ($order['user_id'] != $_SESSION['user_id'])) {
            header("Location: /itc_toi-main/index.php?controller=user_orders&action=index");
            exit();
        }
        
        // Lấy chi tiết sản phẩm trong đơn hàng
        $items = $order_items->get_order_items($order_id);
        
        $smarty->assign('order', $order);
        $smarty->assign('items', $items);
        $smarty->assign('mainContent', 'user_orders/view.tpl');
    }
}
?> 