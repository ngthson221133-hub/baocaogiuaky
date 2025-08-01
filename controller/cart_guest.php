<?php
include_once 'model/cart_guest.php';
include_once 'model/products.php';

class cart_guestController {
    
    public function addAction($smarty) {
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
        
        $cart_guest = new cart_guest();
        $result = $cart_guest->add_to_cart_guest($product_id, $quantity);
        
        if ($result) {
            $cart_count = $cart_guest->get_cart_count_guest();
            echo json_encode(['success' => true, 'message' => 'Đã thêm vào giỏ hàng', 'cart_count' => $cart_count]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra']);
        }
    }
    
    public function updateAction($smarty) {
        $product_id = $_POST['product_id'] ?? 0;
        $quantity = $_POST['quantity'] ?? 0;
        
        $cart_guest = new cart_guest();
        $result = $cart_guest->update_quantity_guest($product_id, $quantity);
        
        if ($result) {
            $cart_count = $cart_guest->get_cart_count_guest();
            $cart_total = $cart_guest->get_cart_total_guest();
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
        $product_id = $_POST['product_id'] ?? 0;
        
        $cart_guest = new cart_guest();
        $result = $cart_guest->remove_item_guest($product_id);
        
        if ($result) {
            $cart_count = $cart_guest->get_cart_count_guest();
            $cart_total = $cart_guest->get_cart_total_guest();
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
        $cart_guest = new cart_guest();
        $cart_items = $cart_guest->get_cart_items_guest();
        $cart_total = $cart_guest->get_cart_total_guest();
        
        $smarty->assign('cart_items', $cart_items);
        $smarty->assign('cart_total', $cart_total);
        $smarty->assign('is_guest', true);
        $smarty->assign('mainContent', 'cart_guest/view.tpl');
    }
    
    public function getCountAction($smarty) {
        $cart_guest = new cart_guest();
        $count = $cart_guest->get_cart_count_guest();
        
        echo json_encode(['count' => $count]);
    }
    
    public function clearAction($smarty) {
        $cart_guest = new cart_guest();
        $result = $cart_guest->clear_cart_guest();
        
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
    
    public function checkoutAction($smarty) {
        // Chuyển hướng đến trang đăng nhập/đăng ký
        $cart_guest = new cart_guest();
        $cart_count = $cart_guest->get_cart_count_guest();
        
        if ($cart_count > 0) {
            // Có sản phẩm trong giỏ hàng, chuyển đến trang đăng nhập
            header('Location: /itc_toi-main/index.php?controller=user&action=login&redirect=checkout');
        } else {
            // Giỏ hàng trống, về trang chủ
            header('Location: /itc_toi-main/index.php');
        }
        exit();
    }
}
?> 