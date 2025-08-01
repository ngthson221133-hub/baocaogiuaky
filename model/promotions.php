<?php

class promotions extends Model
{
    protected $class_name = 'promotions';
    protected $id;
    protected $code;
    protected $name;
    protected $description;
    protected $discount_type;
    protected $discount_value;
    protected $min_order_amount;
    protected $max_discount;
    protected $usage_limit;
    protected $used_count;
    protected $start_date;
    protected $end_date;
    protected $is_active;
    protected $created_at;
    protected $updated_at;
    
    public function list_all($limit = 0, $offset = 0, $search = '', $where = '') {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."`";
        
        if ($where != '') {
            $sql .= " WHERE $where";
        }
        
        if ($search != '') {
            $search = $db->escape_str($search);
            if ($where != '') {
                $sql .= " AND (code LIKE '%$search%' OR name LIKE '%$search%')";
            } else {
                $sql .= " WHERE (code LIKE '%$search%' OR name LIKE '%$search%')";
            }
        }
        
        $sql .= " ORDER BY created_at DESC";
        
        if ($limit > 0) {
            $sql .= " LIMIT $offset, $limit";
        }
        
        return $db->executeQuery_list($sql);
    }
    
    public function get_by_id($id) {
        global $db;
        
        $id = $db->escape_str($id);
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$id'";
        return $db->executeQuery($sql, 1);
    }
    
    public function get_by_code($code) {
        global $db;
        
        $code = $db->escape_str($code);
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `code` = '$code' AND `is_active` = 1";
        return $db->executeQuery($sql, 1);
    }
    
    public function create_promotion($data) {
        global $db;
        
        return $db->record_insert($this->class_name, $data);
    }
    
    public function update_promotion($id, $data) {
        global $db;
        
        return $db->record_update($this->class_name, $data, "id = $id");
    }
    
    public function delete_promotion($id) {
        global $db;
        
        return $db->record_delete($this->class_name, "id = $id");
    }
    
    public function validate_promotion($code, $user_id = null, $order_amount = 0) {
        global $db;
        
        $promotion = $this->get_by_code($code);
        
        if (!$promotion) {
            return ['valid' => false, 'message' => 'Mã khuyến mãi không tồn tại'];
        }
        
        // Kiểm tra ngày hiệu lực
        $today = date('Y-m-d');
        if ($today < $promotion['start_date'] || $today > $promotion['end_date']) {
            return ['valid' => false, 'message' => 'Mã khuyến mãi đã hết hạn hoặc chưa có hiệu lực'];
        }
        
        // Kiểm tra giới hạn sử dụng
        if ($promotion['usage_limit'] && $promotion['used_count'] >= $promotion['usage_limit']) {
            return ['valid' => false, 'message' => 'Mã khuyến mãi đã hết lượt sử dụng'];
        }
        
        // Kiểm tra giá trị đơn hàng tối thiểu
        if ($order_amount < $promotion['min_order_amount']) {
            return ['valid' => false, 'message' => 'Đơn hàng phải có giá trị tối thiểu ' . number_format($promotion['min_order_amount'], 0, ',', '.') . 'đ'];
        }
        
        return ['valid' => true, 'promotion' => $promotion];
    }
    
    public function calculate_discount($promotion, $order_amount) {
        $discount = 0;
        
        if ($promotion['discount_type'] == 'percentage') {
            $discount = $order_amount * ($promotion['discount_value'] / 100);
            if ($promotion['max_discount']) {
                $discount = min($discount, $promotion['max_discount']);
            }
        } else {
            $discount = $promotion['discount_value'];
        }
        
        return $discount;
    }
    
    public function increment_usage($promotion_id) {
        global $db;
        
        $promotion_id = $db->escape_str($promotion_id);
        $sql = "UPDATE $db->tbl_fix`". $this->class_name ."` SET `used_count` = `used_count` + 1 WHERE `id` = '$promotion_id'";
        return $db->executeQuery($sql);
    }
    
    public function record_usage($promotion_id, $user_id, $order_id, $discount_amount) {
        global $db;
        
        $data = [
            'promotion_id' => $promotion_id,
            'user_id' => $user_id,
            'order_id' => $order_id,
            'discount_amount' => $discount_amount
        ];
        
        return $db->record_insert('promotion_usage', $data);
    }
}
?> 