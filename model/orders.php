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
        
        $sql = "SELECT 
                    COUNT(*) as total_orders,
                    SUM(total_amount) as total_revenue,
                    COUNT(CASE WHEN status = 'pending' THEN 1 END) as pending_orders,
                    COUNT(CASE WHEN status = 'confirmed' THEN 1 END) as confirmed_orders,
                    COUNT(CASE WHEN status = 'shipping' THEN 1 END) as shipping_orders,
                    COUNT(CASE WHEN status = 'delivered' THEN 1 END) as delivered_orders,
                    COUNT(CASE WHEN status = 'cancelled' THEN 1 END) as cancelled_orders,
                    COUNT(CASE WHEN DATE(created_at) = CURDATE() THEN 1 END) as today_orders
                FROM orders";
        
        $result = $db->executeQuery_list($sql);
        return $result ? $result[0] : false;
    }
    
    public function get_order_items($order_id) {
        global $db;
        
        $order_id = $db->escape_str($order_id);
        $sql = "SELECT oi.*, p.name as product_name, p.image_url 
                FROM order_items oi 
                LEFT JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = '$order_id'";
        
        return $db->executeQuery_list($sql);
    }
    
    public function create_order_with_items($order_data, $items_data) {
        global $db;
        
        // Tạo order
        $order_id = $this->create_order($order_data);
        if (!$order_id) {
            return false;
        }
        
        // Thêm order items
        foreach ($items_data as $item) {
            $item['order_id'] = $order_id;
            $sql = "INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity) 
                    VALUES ('$order_id', '{$item['product_id']}', '{$item['product_name']}', '{$item['product_price']}', '{$item['quantity']}')";
            
            if (!$db->executeQuery($sql)) {
                // Nếu có lỗi, xóa order đã tạo
                $db->executeQuery("DELETE FROM orders WHERE id = '$order_id'");
                return false;
            }
        }
        
        return $order_id;
    }
}
?>