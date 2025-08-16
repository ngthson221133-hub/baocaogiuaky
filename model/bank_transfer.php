<?php

class bank_transfer
{
    protected $class_name = 'bank_transfer';
    protected $id;
    protected $order_id;
    protected $qr_code;
    protected $transfer_content;
    protected $amount;
    protected $bank_account;
    protected $bank_name;
    protected $expires_at;
    protected $status;
    protected $created_at;
    
    public function create_transfer($order_id, $amount) {
        global $db;
        
        // Tạo nội dung chuyển khoản random
        $transfer_content = $this->generate_random_content();
        
        // Tạo QR code
        $qr_code = $this->generate_qr_code($transfer_content, $amount);
        
        // Thời gian hết hạn (30 phút) - Sử dụng timezone Việt Nam
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $expires_at = date('Y-m-d H:i:s', strtotime('+30 minutes'));
        
        $data = array(
            'order_id' => $order_id,
            'qr_code' => $qr_code,
            'transfer_content' => $transfer_content,
            'amount' => $amount,
            'bank_account' => '333777555', // STK của bạn
            'bank_name' => 'MB Bank',
            'expires_at' => $expires_at,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        );
        
        $ok = $db->record_insert('bank_transfer', $data);
        if ($ok) {
            return $db->mysqli_insert_id();
        }
        return false;
    }
    
    public function get_transfer_by_order($order_id) {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `order_id` = '$order_id' ORDER BY `created_at` DESC LIMIT 1";
        $result = $db->executeQuery($sql, 1);
        
        return $result;
    }
    
    public function get_transfer_by_id($id) {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$id'";
        $result = $db->executeQuery($sql, 1);
        
        return $result;
    }
    
    public function update_status($id, $status) {
        global $db;
        
        $data = array('status' => $status);
        return $db->record_update('bank_transfer', $data, "id = $id");
    }
    
    public function check_expired($id) {
        global $db;
        
        $sql = "SELECT * FROM $db->tbl_fix`". $this->class_name ."` WHERE `id` = '$id' AND `expires_at` > NOW()";
        $result = $db->executeQuery($sql, 1);
        
        return $result ? true : false;
    }
    
    private function generate_random_content() {
        // Tạo nội dung chuyển khoản random: ITC + 6 số ngẫu nhiên
        $random = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return 'ITC' . $random;
    }
    
    private function generate_qr_code($content, $amount) {
        // Tạo QR code cho MB Bank
        $qr_data = array(
            'bankBin' => '970422', // MB Bank BIN
            'accountNo' => '333777555', // STK của bạn
            'amount' => $amount,
            'content' => $content
        );
        
        // Tạo URL QR code cho MB Bank
        $qr_url = $this->create_mb_bank_qr($qr_data);
        
        return $qr_url;
    }
    
    private function create_mb_bank_qr($data) {
        // Tạo QR code theo chuẩn MB Bank
        $qr_string = "https://img.vietqr.io/image/MB-{$data['accountNo']}-compact2.png?amount={$data['amount']}&addInfo={$data['content']}";
        
        return $qr_string;
    }
    
    public function get_pending_transfers() {
        global $db;
        
        $sql = "SELECT bt.*, o.total_amount, u.username FROM $db->tbl_fix`". $this->class_name ."` bt 
                LEFT JOIN orders o ON bt.order_id = o.id 
                LEFT JOIN users u ON o.user_id = u.id 
                WHERE bt.status = 'pending' AND bt.expires_at > NOW() 
                ORDER BY bt.created_at DESC";
        $result = $db->executeQuery_list($sql);
        
        return $result;
    }
    
    public function get_all_transfers() {
        global $db;
        
        $sql = "SELECT bt.*, o.total_amount, u.username FROM $db->tbl_fix`". $this->class_name ."` bt 
                LEFT JOIN orders o ON bt.order_id = o.id 
                LEFT JOIN users u ON o.user_id = u.id 
                ORDER BY bt.created_at DESC";
        $result = $db->executeQuery_list($sql);
        
        return $result;
    }
    
    public function get_transfers_by_status($status) {
        global $db;
        
        $sql = "SELECT bt.*, o.total_amount, u.username FROM $db->tbl_fix`". $this->class_name ."` bt 
                LEFT JOIN orders o ON bt.order_id = o.id 
                LEFT JOIN users u ON o.user_id = u.id 
                WHERE bt.status = '$status'
                ORDER BY bt.created_at DESC";
        $result = $db->executeQuery_list($sql);
        
        return $result;
    }
    
    public function mark_as_paid($id) {
        global $db;
        
        $data = array(
            'status' => 'paid',
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        $ok = $db->record_update('bank_transfer', $data, "id = $id");
        
        if ($ok) {
            // Cập nhật trạng thái đơn hàng
            $transfer = $this->get_transfer_by_id($id);
            if ($transfer) {
                include_once 'model/orders.php';
                $order_model = new orders();
                $order_model->update_order_status($transfer['order_id'], 'confirmed');
                
                // Xóa giỏ hàng sau khi xác nhận thanh toán (chỉ với user đã đăng nhập)
                include_once 'model/cart.php';
                $order = $order_model->get_order_by_id($transfer['order_id']);
                if ($order && $order['user_id']) {
                    $cart = new cart();
                    $cart->clear_cart($order['user_id']);
                }
            }
        }
        
        return $ok;
    }

    public function create_simple_transfer($order_id, $amount) {
        global $db;
        
        // Tạo nội dung chuyển khoản đơn giản
        $transfer_content = 'ITC' . $order_id;
        
        $data = array(
            'order_id' => $order_id,
            'qr_code' => '', // Không cần QR code
            'transfer_content' => $transfer_content,
            'amount' => $amount,
            'bank_account' => '333777555', // STK của bạn
            'bank_name' => 'MB Bank',
            'expires_at' => null, // Không cần hết hạn
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        );
        
        $ok = $db->record_insert('bank_transfer', $data);
        if ($ok) {
            return $db->mysqli_insert_id();
        }
        return false;
    }

    public function get_paid_transfers() {
        global $db;
        
        $sql = "SELECT bt.*, o.total_amount, u.username 
                FROM $db->tbl_fix`bank_transfer` bt 
                LEFT JOIN $db->tbl_fix`orders` o ON bt.order_id = o.id 
                LEFT JOIN $db->tbl_fix`users` u ON o.user_id = u.id 
                WHERE bt.status = 'paid' 
                ORDER BY bt.created_at DESC";
        $result = $db->executeQuery_list($sql);
        
        return $result;
    }
}
?> 