<?php

class order_items extends Model
{
    protected $class_name = 'order_items';
    protected $id;
    protected $order_id;
    protected $product_id;
    protected $product_name;
    protected $product_price;
    protected $quantity;
    protected $subtotal;

    public function add_order_items($order_id, $items) {
        global $db;
        
        foreach ($items as $item) {
            $order_id_escaped = $db->escape_str($order_id);
            $product_id = $db->escape_str($item['product_id']);
            $product_name = $db->escape_str($item['product_name']);
            $product_price = $db->escape_str($item['product_price']);
            $quantity = $db->escape_str($item['quantity']);
            $subtotal = $db->escape_str($item['subtotal']);
            
            $sql = "INSERT INTO order_items (order_id, product_id, product_name, product_price, quantity, subtotal) 
                    VALUES ('$order_id_escaped', '$product_id', '$product_name', '$product_price', '$quantity', '$subtotal')";
            
            $db->executeQuery($sql);
        }
        
        return true;
    }

    public function get_order_items($order_id) {
        global $db;
        
        $order_id = $db->escape_str($order_id);
        $sql = "SELECT oi.*, p.image_url 
                FROM order_items oi 
                LEFT JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = '$order_id'";
        
        return $db->executeQuery_list($sql);
    }

    public function delete_order_items($order_id) {
        global $db;
        
        $order_id = $db->escape_str($order_id);
        $sql = "DELETE FROM order_items WHERE order_id = '$order_id'";
        return $db->executeQuery($sql);
    }
}
?>