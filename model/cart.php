<?php

class cart extends Model
{
    protected $class_name = 'cart';
    protected $id;
    protected $user_id;
    protected $product_id;
    protected $quantity;
    protected $created_at;
    
    public function add_to_cart($user_id, $product_id, $quantity) {
        global $db;
        
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $sql = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
        $existing = $db->executeQuery($sql, 1);
        
        if ($existing) {
            // Nếu đã có, cập nhật số lượng
            $new_quantity = $existing['quantity'] + $quantity;
            $sql = "UPDATE cart SET quantity = '$new_quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
            return $db->executeQuery($sql);
        } else {
            // Nếu chưa có, thêm mới
            $sql = "INSERT INTO cart (user_id, product_id, quantity, created_at) VALUES ('$user_id', '$product_id', '$quantity', NOW())";
            return $db->executeQuery($sql);
        }
    }
    
    public function get_cart_items($user_id) {
        global $db;
        
        $sql = "SELECT c.*, p.name, p.price, p.image_url, p.quantity as stock_quantity 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = '$user_id' 
                ORDER BY c.created_at DESC";
        
        return $db->executeQuery_list($sql);
    }
    
    public function update_quantity($user_id, $product_id, $quantity) {
        global $db;
        
        if ($quantity <= 0) {
            // Nếu số lượng <= 0, xóa item
            return $this->remove_item($user_id, $product_id);
        }
        
        $sql = "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
        return $db->executeQuery($sql);
    }
    
    public function remove_item($user_id, $product_id) {
        global $db;
        
        $sql = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
        return $db->executeQuery($sql);
    }
    
    public function clear_cart($user_id) {
        global $db;
        
        $sql = "DELETE FROM cart WHERE user_id = '$user_id'";
        return $db->executeQuery($sql);
    }
    
    public function get_cart_count($user_id) {
        global $db;
        
        $sql = "SELECT SUM(quantity) as total FROM cart WHERE user_id = '$user_id'";
        $result = $db->executeQuery($sql, 1);
        
        return $result ? $result['total'] : 0;
    }
    
    public function get_cart_total($user_id) {
        global $db;
        
        $sql = "SELECT SUM(c.quantity * p.price) as total 
                FROM cart c 
                JOIN products p ON c.product_id = p.id 
                WHERE c.user_id = '$user_id'";
        
        $result = $db->executeQuery($sql, 1);
        return $result ? $result['total'] : 0;
    }
}
?>