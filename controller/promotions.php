<?php
class promotionsController {
    
    public function indexAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/promotions.php';
        $promotions = new promotions();
        
        // Danh sách khuyến mãi
        $search = $_GET['q'] ?? '';
        $list = $promotions->list_all(0, 0, $search);
        
        $smarty->assign('promotions', $list);
        $smarty->assign('search', $search);
        $smarty->assign('message', $_GET['msg'] ?? '');
        $smarty->assign('error', $_GET['error'] ?? '');
        $smarty->assign('mainContent', 'promotions/index.tpl');
    }
    
    public function addAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $smarty->assign('mainContent', 'promotions/add.tpl');
        } else {
            include_once 'model/promotions.php';
            $promotions = new promotions();
            
            $data = [
                'code' => strtoupper($_POST['code']),
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'discount_type' => $_POST['discount_type'],
                'discount_value' => $_POST['discount_value'],
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
            
            global $db;
            $ok = $db->record_insert('promotions', $data);
            $message = $ok ? 'Thêm mã khuyến mãi thành công!' : 'Thêm thất bại!';
            header('Location: /itc_toi-main/index.php?controller=promotions&action=index&msg='.urlencode($message));
            exit();
        }
    }
    
    public function editAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        include_once 'model/promotions.php';
        $promotions = new promotions();
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? 0;
            $promotion = $promotions->get_by_id($id);
            
            if (!$promotion) {
                header('Location: /itc_toi-main/index.php?controller=promotions&action=index&error=1');
                exit();
            }
            
            $smarty->assign('promotion', $promotion);
            $smarty->assign('mainContent', 'promotions/edit.tpl');
        } else {
            $id = intval($_POST['id']);
            $data = [
                'code' => strtoupper($_POST['code']),
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'discount_type' => $_POST['discount_type'],
                'discount_value' => $_POST['discount_value'],
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
            
            global $db;
            $ok = $db->record_update('promotions', $data, "id = $id");
            $message = $ok ? 'Cập nhật mã khuyến mãi thành công!' : 'Cập nhật thất bại!';
            header('Location: /itc_toi-main/index.php?controller=promotions&action=index&msg='.urlencode($message));
            exit();
        }
    }
    
    public function deleteAction($smarty) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo 'Bạn không có quyền truy cập trang này.';
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = intval($_POST['id']);
            global $db;
            $ok = $db->record_delete('promotions', "id = $id");
            $message = $ok ? 'Xóa mã khuyến mãi thành công!' : 'Xóa thất bại!';
            header('Location: /itc_toi-main/index.php?controller=promotions&action=index&msg='.urlencode($message));
            exit();
        }
    }
}
?> 