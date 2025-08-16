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
        $transfer_id = $bank_transfer->create_simple_transfer($order_id, $amount);
        
        if ($transfer_id) {
            header('Location: /itc_toi-main/index.php?controller=bank_transfer&action=show&id=' . $transfer_id);
            exit();
        } else {
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Không thể tạo thông tin chuyển khoản!'));
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
            header('Location: /itc_toi-main/index.php?msg=' . urlencode('Thông tin chuyển khoản không hợp lệ!'));
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
        
        $smarty->assign('transfer', $transfer);
        $smarty->assign('order', $order);
        $smarty->assign('pageTitle', 'Thông tin chuyển khoản');
        $smarty->assign('mainContent', 'bank_transfer/show.tpl');
    }
    
    public function adminAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/bank_transfer.php';
        $bank_transfer = new bank_transfer();
        
        $pending_transfers = $bank_transfer->get_pending_transfers();
        $paid_transfers = $bank_transfer->get_paid_transfers();
        
        $smarty->assign('pending_transfers', $pending_transfers);
        $smarty->assign('paid_transfers', $paid_transfers);
        $smarty->assign('pageTitle', 'Quản lý chuyển khoản');
        $smarty->assign('mainContent', 'bank_transfer/admin.tpl');
    }
    
    public function markPaidAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transfer_id = intval($_POST['transfer_id'] ?? 0);
            
            if ($transfer_id <= 0) {
                header('Location: /itc_toi-main/index.php?controller=bank_transfer&action=admin&error=1');
                exit();
            }
            
            include_once 'model/bank_transfer.php';
            $bank_transfer = new bank_transfer();
            
            $ok = $bank_transfer->mark_as_paid($transfer_id);
            $message = $ok ? 'Xác nhận thanh toán thành công!' : 'Xác nhận thất bại!';
            header('Location: /itc_toi-main/index.php?controller=bank_transfer&action=admin&msg='.urlencode($message));
            exit();
        }
    }
}
?> 