<?php
class bank_transferController {
    
    public function createAction($smarty) {
        if (!isset($_SESSION['username'])) {
            header('Location: /itc_toi-main/index.php?controller=user&action=login');
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        include_once 'model/orders.php';
        
        $order_id = intval($_POST['order_id'] ?? $_GET['order_id'] ?? 0);
        $amount = floatval($_POST['amount'] ?? $_GET['amount'] ?? 0);
        
        if ($order_id <= 0 || $amount <= 0) {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Thông tin đơn hàng không hợp lệ!'));
            exit();
        }
        
        $bank_transfer = new bank_transfer();
        $transfer_id = $bank_transfer->create_transfer($order_id, $amount);
        
        if ($transfer_id) {
            header('Location: /itc_toi-main/index.php?controller=bank_transfer&action=show&id=' . $transfer_id);
            exit();
        } else {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Không thể tạo mã chuyển khoản!'));
            exit();
        }
    }
    
    public function showAction($smarty) {
        if (!isset($_SESSION['username'])) {
            header('Location: /itc_toi-main/index.php?controller=user&action=login');
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        include_once 'model/orders.php';
        
        $transfer_id = intval($_GET['id'] ?? 0);
        
        if ($transfer_id <= 0) {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Mã chuyển khoản không hợp lệ!'));
            exit();
        }
        
        $bank_transfer = new bank_transfer();
        $transfer = $bank_transfer->get_transfer_by_id($transfer_id);
        
        if (!$transfer) {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Không tìm thấy thông tin chuyển khoản!'));
            exit();
        }
        
        // Kiểm tra xem có phải chủ đơn hàng không
        $orders = new orders();
        $order = $orders->get_order_by_id($transfer['order_id']);
        
        if (!$order || $order['user_id'] != $_SESSION['user_id']) {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Bạn không có quyền xem thông tin này!'));
            exit();
        }
        
        // Kiểm tra hết hạn
        $is_expired = !$bank_transfer->check_expired($transfer_id);
        
        $smarty->assign('transfer', $transfer);
        $smarty->assign('order', $order);
        $smarty->assign('is_expired', $is_expired);
        $smarty->assign('pageTitle', 'Chuyển khoản ngân hàng');
        $smarty->assign('mainContent', 'bank_transfer/show.tpl');
    }
    
    public function checkAction($smarty) {
        if (!isset($_SESSION['username'])) {
            echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        
        $transfer_id = intval($_POST['transfer_id'] ?? 0);
        
        if ($transfer_id <= 0) {
            echo json_encode(['success' => false, 'message' => 'Mã chuyển khoản không hợp lệ']);
            exit();
        }
        
        $bank_transfer = new bank_transfer();
        $transfer = $bank_transfer->get_transfer_by_id($transfer_id);
        
        if (!$transfer) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin chuyển khoản']);
            exit();
        }
        
        // Kiểm tra xem có phải chủ đơn hàng không
        $orders = new orders();
        $order = $orders->get_order_by_id($transfer['order_id']);
        
        if (!$order || $order['user_id'] != $_SESSION['user_id']) {
            echo json_encode(['success' => false, 'message' => 'Bạn không có quyền kiểm tra thông tin này']);
            exit();
        }
        
        // Kiểm tra hết hạn
        $is_expired = !$bank_transfer->check_expired($transfer_id);
        
        if ($is_expired) {
            echo json_encode(['success' => false, 'message' => 'Mã chuyển khoản đã hết hạn']);
            exit();
        }
        
        // Ở đây bạn có thể tích hợp với API ngân hàng để kiểm tra thực tế
        // Hiện tại chỉ trả về thông tin cơ bản
        echo json_encode([
            'success' => true,
            'status' => $transfer['status'],
            'expires_at' => $transfer['expires_at'],
            'is_expired' => $is_expired
        ]);
    }
    
    public function adminAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        
        $bank_transfer = new bank_transfer();
        
        // Lấy tất cả giao dịch để hiển thị
        $all_transfers = $bank_transfer->get_all_transfers();
        $pending_transfers = $bank_transfer->get_pending_transfers();
        $paid_transfers = $bank_transfer->get_transfers_by_status('paid');
        $expired_transfers = $bank_transfer->get_transfers_by_status('expired');
        
        $smarty->assign('all_transfers', $all_transfers);
        $smarty->assign('pending_transfers', $pending_transfers);
        $smarty->assign('paid_transfers', $paid_transfers);
        $smarty->assign('expired_transfers', $expired_transfers);
        $smarty->assign('pageTitle', 'Quản lý chuyển khoản');
        $smarty->assign('mainContent', 'bank_transfer/admin.tpl');
    }
    
    public function markPaidAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Không có quyền']);
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        
        $transfer_id = intval($_POST['transfer_id'] ?? 0);
        
        if ($transfer_id <= 0) {
            echo json_encode(['success' => false, 'message' => 'Mã chuyển khoản không hợp lệ']);
            exit();
        }
        
        $bank_transfer = new bank_transfer();
        $ok = $bank_transfer->mark_as_paid($transfer_id);
        
        if ($ok) {
            echo json_encode(['success' => true, 'message' => 'Đã xác nhận thanh toán thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không thể xác nhận thanh toán']);
        }
    }
}
?> 