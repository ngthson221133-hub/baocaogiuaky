<?php
include_once 'model/cart.php';
include_once 'model/products.php';

class cartController {
    
    public function addAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để thêm vào giỏ hàng']);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 1;
        
        if (!$product_id || $quantity <= 0) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }
        
        $products = new products();
        
        // Kiểm tra số lượng tồn kho
        if (!$products->check_stock($product_id, $quantity)) {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không đủ số lượng trong kho']);
            return;
        }
        
        $cart = new cart();
        $result = $cart->add_to_cart($user_id, $product_id, $quantity);
        
        if ($result) {
            $cart_count = $cart->get_cart_count($user_id);
            echo json_encode(['success' => true, 'message' => 'Đã thêm vào giỏ hàng', 'cart_count' => $cart_count]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
    }
    
    public function updateAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        
        $cart = new cart();
        $result = $cart->update_quantity($user_id, $product_id, $quantity);
        
        if ($result) {
            $cart_count = $cart->get_cart_count($user_id);
            $cart_total = $cart->get_cart_total($user_id);
            echo json_encode([
                'success' => true, 
                'message' => 'Đã cập nhật giỏ hàng', 
                'cart_count' => $cart_count,
                'cart_total' => number_format($cart_total, 0, ',', '.')
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
    }
    
    public function removeAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'] ?? 0;
        
        $cart = new cart();
        $result = $cart->remove_item($user_id, $product_id);
        
        if ($result) {
            $cart_count = $cart->get_cart_count($user_id);
            $cart_total = $cart->get_cart_total($user_id);
            echo json_encode([
                'success' => true, 
                'message' => 'Đã xóa sản phẩm', 
                'cart_count' => $cart_count,
                'cart_total' => number_format($cart_total, 0, ',', '.')
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
    }
    
    public function viewAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /itc_toi-main/index.php?controller=user&action=login');
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $cart = new cart();
        $cart_items = $cart->get_cart_items($user_id);
        $cart_total = $cart->get_cart_total($user_id);
        
        $smarty->assign('cart_items', $cart_items);
        $smarty->assign('cart_total', $cart_total);
        $smarty->assign('mainContent', 'cart/view.tpl');
    }
    
    public function getCountAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['count' => 0]);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $cart = new cart();
        $count = $cart->get_cart_count($user_id);
        
        echo json_encode(['count' => $count]);
    }
    
    public function clearAction($smarty) {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }
        
        $user_id = $_SESSION['user_id'];
        $cart = new cart();
        $result = $cart->clear_cart($user_id);
        
        if ($result) {
            echo json_encode([
                'success' => true, 
                'message' => 'Đã xóa toàn bộ giỏ hàng', 
                'cart_count' => 0,
                'cart_total' => '0'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
    }
}
?> 