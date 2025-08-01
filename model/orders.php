<?php

class orders
{
    protected $class_name = 'orders';
    protected $id;
    protected $user_id;
    protected $guest_email;
    protected $guest_name;
    protected $guest_phone;
    protected $total_amount;
    protected $status;
    protected $shipping_address;
    protected $payment_method;
    protected $notes;
    protected $created_at;
    protected $updated_at;

    public function create_order($data) {
        global $db;
        
        $user_id = $data['user_id'] ? "'" . $db->escape_str($data['user_id']) . "'" : "NULL";
        $guest_email = "'" . $db->escape_str($data['guest_email']) . "'";
        $guest_name = "'" . $db->escape_str($data['guest_name']) . "'";
        $guest_phone = "'" . $db->escape_str($data['guest_phone']) . "'";
        $total_amount = "'" . $db->escape_str($data['total_amount']) . "'";
        $shipping_address = "'" . $db->escape_str($data['shipping_address']) . "'";
        $payment_method = "'" . $db->escape_str($data['payment_method']) . "'";
        $notes = "'" . $db->escape_str($data['notes']) . "'";
        
        // Xác định trạng thái ban đầu dựa trên phương thức thanh toán
        $initial_status = ($data['payment_method'] === 'bank_transfer') ? 'pending' : 'pending';
        $status = "'" . $db->escape_str($initial_status) . "'";
        
        $sql = "INSERT INTO orders (user_id, guest_email, guest_name, guest_phone, total_amount, shipping_address, payment_method, notes, status) 
                VALUES ($user_id, $guest_email, $guest_name, $guest_phone, $total_amount, $shipping_address, $payment_method, $notes, $status)";
        
        $result = $db->executeQuery($sql);
        
        if ($result) {
            return $db->mysqli_insert_id();
        }
        return false;
    }

    public function get_order_by_id($order_id) {
        global $db;
        
        $order_id = $db->escape_str($order_id);
        $sql = "SELECT o.*, u.username, u.email as user_email 
                FROM orders o 
                LEFT JOIN users u ON o.user_id = u.id 
                WHERE o.id = '$order_id'";
        
        $result = $db->executeQuery_list($sql);
        return $result ? $result[0] : false;
    }

    public function get_orders_by_user($user_id) {
        global $db;
        
        $user_id = $db->escape_str($user_id);
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY created_at DESC";
        return $db->executeQuery_list($sql);
    }

    public function get_all_orders() {
        global $db;
        
        $sql = "SELECT o.*, u.username, u.email as user_email 
                FROM orders o 
                LEFT JOIN users u ON o.user_id = u.id 
                ORDER BY o.created_at DESC";
        return $db->executeQuery_list($sql);
    }

    public function update_order_status($order_id, $status) {
        global $db;
        
        $order_id = $db->escape_str($order_id);
        $status = $db->escape_str($status);
        $sql = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
        return $db->executeQuery($sql);
    }

    public function get_orders_by_status($status) {
        global $db;
        
        $status = $db->escape_str($status);
        $sql = "SELECT o.*, u.username, u.email as user_email 
                FROM orders o 
                LEFT JOIN users u ON o.user_id = u.id 
                WHERE o.status = '$status' 
                ORDER BY o.created_at DESC";
        return $db->executeQuery_list($sql);
    }

    public function get_order_statistics() {
        global $db;
        
        $stats = [];
        
        // Tổng số đơn hàng
        $sql_total = "SELECT COUNT(*) as total FROM orders";
        $result_total = $db->executeQuery_list($sql_total);
        $stats['total_orders'] = $result_total[0]['total'];
        
        // Đơn hàng theo trạng thái
        $sql_status = "SELECT status, COUNT(*) as count FROM orders GROUP BY status";
        $result_status = $db->executeQuery_list($sql_status);
        $stats['by_status'] = $result_status;
        
        // Tổng doanh thu
        $sql_revenue = "SELECT SUM(total_amount) as total_revenue FROM orders WHERE status != 'cancelled'";
        $result_revenue = $db->executeQuery_list($sql_revenue);
        $stats['total_revenue'] = $result_revenue[0]['total_revenue'] ?? 0;
        
        // Đơn hàng hôm nay
        $sql_today = "SELECT COUNT(*) as today_orders FROM orders WHERE DATE(created_at) = CURDATE()";
        $result_today = $db->executeQuery_list($sql_today);
        $stats['today_orders'] = $result_today[0]['today_orders'];
        
        return $stats;
    }
}
?>