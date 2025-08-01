<?php
class dashboardController {
    
    public function indexAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/orders.php';
        include_once 'model/users.php';
        include_once 'model/order_items.php';
        include_once 'model/products.php';
        include_once 'model/categories.php';
        
        global $db;
        
        // Tổng doanh thu
        $total_revenue = $db->executeQuery_list('SELECT SUM(total_amount) as revenue FROM orders');
        $total_revenue = isset($total_revenue[0]['revenue']) ? $total_revenue[0]['revenue'] : 0;
        
        // Số đơn hàng
        $total_orders = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM orders');
        $total_orders = isset($total_orders[0]['cnt']) ? $total_orders[0]['cnt'] : 0;
        
        // Số sản phẩm
        $total_products = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM products');
        $total_products = isset($total_products[0]['cnt']) ? $total_products[0]['cnt'] : 0;
        
        // Số user
        $total_users = $db->executeQuery_list('SELECT COUNT(*) as cnt FROM users');
        $total_users = isset($total_users[0]['cnt']) ? $total_users[0]['cnt'] : 0;
        
        // Đơn hàng gần đây
        $recent_orders = $db->executeQuery_list('SELECT o.*, u.username FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC LIMIT 5');
        
        // Dữ liệu biểu đồ 7 ngày gần đây
        $weekly_data = [];
        $weekly_labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $weekly_labels[] = "'" . date('d/m', strtotime($date)) . "'";
            
            $result = $db->executeQuery_list("SELECT COUNT(*) as orders, SUM(total_amount) as revenue FROM orders WHERE DATE(created_at) = '$date'");
            $weekly_data[] = [
                'orders' => $result[0]['orders'] ?? 0,
                'revenue' => $result[0]['revenue'] ?? 0
            ];
        }
        
        // Top sản phẩm bán chạy
        $top_products = $db->executeQuery_list('
            SELECT oi.product_name, SUM(oi.quantity) as total_sold, SUM(oi.quantity * oi.product_price) as total_revenue
            FROM order_items oi
            GROUP BY oi.product_id, oi.product_name
            ORDER BY total_sold DESC
            LIMIT 5
        ');
        
        // Thống kê theo trạng thái đơn hàng
        $order_status_stats = $db->executeQuery_list('
            SELECT status, COUNT(*) as count
            FROM orders
            GROUP BY status
        ');
        
        // Gán dữ liệu cho template
        $smarty->assign('total_revenue', $total_revenue);
        $smarty->assign('total_orders', $total_orders);
        $smarty->assign('total_products', $total_products);
        $smarty->assign('total_users', $total_users);
        $smarty->assign('recent_orders', $recent_orders);
        $smarty->assign('weekly_data', $weekly_data);
        $smarty->assign('weekly_labels', implode(',', $weekly_labels));
        $smarty->assign('top_products', $top_products);
        $smarty->assign('order_status_stats', $order_status_stats);
        $smarty->assign('pageTitle', 'Dashboard');
        $smarty->assign('mainContent', 'dashboard/index.tpl');
    }
}
?> 