<?php
        include_once 'model/orders.php';
        include_once 'model/cart.php';
        include_once 'model/products.php';
        include_once 'model/promotions.php';

class checkoutController {
    
    public function indexAction($smarty) {
        // Yêu cầu đăng nhập để thanh toán
        if (!isset($_SESSION['user_id'])) {
            header("Location: /itc_toi-main/index.php?controller=user&action=login");
            exit();
        }
        
        $cart = new cart();
        $cart_items = $cart->get_cart_items($_SESSION['user_id']);
        $cart_total = $cart->get_cart_total($_SESSION['user_id']);
        
        if (empty($cart_items)) {
            header("Location: /itc_toi-main/index.php?controller=user&action=welcome");
            exit();
        }
        
        $smarty->assign('cart_items', $cart_items);
        $smarty->assign('cart_total', $cart_total);
        $smarty->assign('is_logged_in', true);
        $smarty->assign('user_id', $_SESSION['user_id']);
        
        $smarty->assign('mainContent', 'checkout/index.tpl');
    }
    
    public function processAction($smarty) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: /itc_toi-main/index.php?controller=checkout&action=index");
            exit();
        }
        
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            return;
        }
        
        $orders = new orders();
        $products = new products();
        $promotions = new promotions();
        $cart = new cart();
        
        // Lấy dữ liệu từ form
        $order_data = [
            'user_id' => $_SESSION['user_id'],
            'guest_email' => '',
            'guest_name' => '',
            'guest_phone' => '',
            'shipping_address' => $_POST['address'] ?? '',
            'payment_method' => $_POST['payment_method'] ?? 'cod',
            'notes' => $_POST['notes'] ?? ''
        ];
        
        // Lấy giỏ hàng
        $cart_items = $cart->get_cart_items($_SESSION['user_id']);
        $cart_total = $cart->get_cart_total($_SESSION['user_id']);
        
        if (empty($cart_items)) {
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống']);
            return;
        }
        
        // Xử lý mã khuyến mãi
        $promotion_code = $_POST['promotion_code'] ?? '';
        $discount_amount = 0;
        $promotion_id = null;
        
        if ($promotion_code) {
            $validation = $promotions->validate_promotion($promotion_code, $_SESSION['user_id'], $cart_total);
            if ($validation['valid']) {
                $promotion = $validation['promotion'];
                $discount_amount = $promotions->calculate_discount($promotion, $cart_total);
                $promotion_id = $promotion['id'];
            }
        }
        
        $order_data['total_amount'] = $cart_total - $discount_amount;
        $order_data['promotion_id'] = $promotion_id;
        $order_data['discount_amount'] = $discount_amount;
        
        // Chuẩn bị dữ liệu items
        $items_data = [];
        foreach ($cart_items as $item) {
            $items_data[] = [
                'product_id' => $item['product_id'],
                'product_name' => $item['name'] ?? $item['product_name'] ?? 'Sản phẩm không xác định',
                'product_price' => $item['price'],
                'quantity' => $item['quantity']
            ];
        }
        
        // Tạo đơn hàng kèm items
        $order_id = $orders->create_order_with_items($order_data, $items_data);
        
        if ($order_id) {
            // Cập nhật số lượng sản phẩm trong kho
            foreach ($cart_items as $item) {
                $products->update_quantity($item['product_id'], $item['quantity']);
            }
            
            // Ghi lại việc sử dụng mã khuyến mãi
            if ($promotion_id) {
                $promotions->increment_usage($promotion_id);
                $promotions->record_usage($promotion_id, $_SESSION['user_id'], $order_id, $discount_amount);
            }
            
            // Xử lý theo phương thức thanh toán
            if ($order_data['payment_method'] === 'bank_transfer') {
                include_once 'model/bank_transfer.php';
                $bank_transfer = new bank_transfer();
                $transfer_id = $bank_transfer->create_simple_transfer($order_id, $order_data['total_amount']);
                
                if ($transfer_id) {
                    if (isset($_POST['ajax'])) {
                        echo json_encode([
                            'success' => true,
                            'message' => 'Vui lòng thanh toán qua chuyển khoản để hoàn tất đơn hàng.',
                            'order_id' => $order_id,
                            'transfer_id' => $transfer_id,
                            'redirect_url' => "/itc_toi-main/index.php?controller=bank_transfer&action=show&id=" . $transfer_id
                        ]);
                    } else {
                        header("Location: /itc_toi-main/index.php?controller=bank_transfer&action=show&id=" . $transfer_id);
                    }
                } else {
                    if (isset($_POST['ajax'])) {
                        echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi tạo thông tin chuyển khoản']);
                    } else {
                        header("Location: /itc_toi-main/index.php?controller=checkout&action=index&error=1");
                    }
                }
            } else {
                // COD - xóa giỏ hàng ngay
                $cart->clear_cart($_SESSION['user_id']);
                
                if (isset($_POST['ajax'])) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Đặt hàng thành công!',
                        'order_id' => $order_id
                    ]);
                } else {
                    header("Location: /itc_toi-main/index.php?controller=checkout&action=success&order_id=" . $order_id);
                }
            }
        } else {
            if (isset($_POST['ajax'])) {
                echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi đặt hàng']);
            } else {
                header("Location: /itc_toi-main/index.php?controller=checkout&action=index&error=1");
            }
        }
    }
    
    public function successAction($smarty) {
        $order_id = $_GET['order_id'] ?? 0;
        
        if ($order_id) {
            $orders = new orders();
            $order = $orders->get_order_by_id($order_id);
            $items = $orders->get_order_items($order_id);
            
            $smarty->assign('order', $order);
            $smarty->assign('items', $items);
        }
        
        $smarty->assign('mainContent', 'checkout/success.tpl');
    }
    
    public function validatePromotionAction($smarty) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ']);
            return;
        }
        
        $promotion_code = $_POST['promotion_code'] ?? '';
        $order_amount = floatval($_POST['order_amount'] ?? 0);
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        
        if (!$promotion_code) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập mã khuyến mãi']);
            return;
        }
        
        $promotions = new promotions();
        $validation = $promotions->validate_promotion($promotion_code, $user_id, $order_amount);
        
        if ($validation['valid']) {
            $promotion = $validation['promotion'];
            $discount_amount = $promotions->calculate_discount($promotion, $order_amount);
            
            echo json_encode([
                'success' => true,
                'message' => 'Mã khuyến mãi hợp lệ',
                'promotion' => $promotion,
                'discount_amount' => $discount_amount
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => $validation['message']
            ]);
        }
    }
}
?> 