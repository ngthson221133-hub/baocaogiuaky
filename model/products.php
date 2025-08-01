<?php

class products extends Model
{
    protected $class_name = 'products';
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;
    protected $image_url;
    protected $created_at;
    
    public function get_detail_by_id($id) {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$id'";
        $result = $db->executeQuery( $sql, 1);

        return $result;
    }
    
    public function update_quantity($product_id, $quantity_to_reduce) {
        global $db;
        
        // Lấy số lượng hiện tại
        $sql = "SELECT quantity FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$product_id'";
        $result = $db->executeQuery($sql, 1);
        
        if (!$result) {
            return false;
        }
        
        $current_quantity = $result['quantity'];
        $new_quantity = max(0, $current_quantity - $quantity_to_reduce);
        
        // Cập nhật số lượng mới
        $sql = "UPDATE $db->tbl_fix`". $this->class_name ."` SET `quantity` = '$new_quantity' WHERE `id` = '$product_id'";
        return $db->executeQuery($sql);
    }
    
    public function check_stock($product_id, $requested_quantity) {
        global $db;
        
        $sql = "SELECT quantity FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$product_id'";
        $result = $db->executeQuery($sql, 1);
        
        if (!$result) {
            return false;
        }
        
        return $result['quantity'] >= $requested_quantity;
    }
}