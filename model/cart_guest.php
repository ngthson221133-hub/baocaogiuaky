<?php
class cart_guest extends Model {
    protected $class_name = 'cart_guest';
    
    public function add_to_cart_guest($product_id, $quantity) {
        // Sử dụng session để lưu giỏ hàng khách
        if (!isset($_SESSION['guest_cart'])) {
            $_SESSION['guest_cart'] = [];
        }
        
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['guest_cart'][$product_id])) {
            $_SESSION['guest_cart'][$product_id] += $quantity;
        } else {
            $_SESSION['guest_cart'][$product_id] = $quantity;
        }
        
        return true;
    }
    
    public function get_cart_items_guest() {
        if (!isset($_SESSION['guest_cart']) || empty($_SESSION['guest_cart'])) {
            return [];
        }
        
        global $db;
        $product_ids = array_keys($_SESSION['guest_cart']);
        $product_ids_str = implode(',', $product_ids);
        
        $sql = "SELECT * FROM products WHERE id IN ($product_ids_str)";
        $products = $db->executeQuery_list($sql);
        
        $cart_items = [];
        foreach ($products as $product) {
            $product['quantity'] = $_SESSION['guest_cart'][$product['id']];
            $cart_items[] = $product;
        }
        
        return $cart_items;
    }
    
    public function update_quantity_guest($product_id, $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['guest_cart'][$product_id]);
        } else {
            $_SESSION['guest_cart'][$product_id] = $quantity;
        }
        return true;
    }
    
    public function remove_item_guest($product_id) {
        unset($_SESSION['guest_cart'][$product_id]);
        return true;
    }
    
    public function clear_cart_guest() {
        unset($_SESSION['guest_cart']);
        return true;
    }
    
    public function get_cart_count_guest() {
        if (!isset($_SESSION['guest_cart'])) {
            return 0;
        }
        return array_sum($_SESSION['guest_cart']);
    }
    
    public function get_cart_total_guest() {
        $cart_items = $this->get_cart_items_guest();
        $total = 0;
        foreach ($cart_items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    public function transfer_to_user_cart($user_id) {
        if (!isset($_SESSION['guest_cart']) || empty($_SESSION['guest_cart'])) {
            return true;
        }
        
        global $db;
        $cart = new cart();
        
        foreach ($_SESSION['guest_cart'] as $product_id => $quantity) {
            $cart->add_to_cart($user_id, $product_id, $quantity);
        }
        
        // Xóa giỏ hàng khách
        $this->clear_cart_guest();
        
        return true;
    }
}
?> 