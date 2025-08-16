<?php
// controller/report.php

include_once 'model/users.php';

function salesAction($smarty) {
    include_once 'model/orders.php';
    include_once 'model/products.php';
    
    $orders = new orders();
    $products = new products();
    
    // Lấy tất cả đơn hàng
    $all_orders = $orders->get_all_orders();
    
    // Tính tổng doanh thu
    $total_revenue = 0;
    $total_orders = count($all_orders);
    $today_revenue = 0;
    $today_orders = 0;
    $today = date('Y-m-d');
    
    // Khởi tạo mảng đếm theo tháng
    $monthly_revenue = array_fill(1, 12, 0);
    $monthly_orders = array_fill(1, 12, 0);
    
    // Khởi tạo mảng đếm theo 7 ngày gần đây
    $weekly_revenue = array_fill(0, 7, 0);
    $weekly_orders = array_fill(0, 7, 0);
    $weekly_labels = [];
    
    // Tạo labels cho 7 ngày gần đây
    for ($i = 6; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $weekly_labels[] = "'" . date('d/m', strtotime($date)) . "'";
    }
    
    // Lấy top sản phẩm bán chạy
    $top_products = [];
    $product_sales = [];
    
    foreach ($all_orders as $order) {
        $order_amount = floatval($order['total_amount']);
        $total_revenue += $order_amount;
        
        // Đếm theo ngày
        if (isset($order['created_at'])) {
            $order_date = date('Y-m-d', strtotime($order['created_at']));
            if ($order_date === $today) {
                $today_revenue += $order_amount;
                $today_orders++;
            }
            
            // Đếm theo tháng
            $month = (int)date('n', strtotime($order['created_at']));
            $monthly_revenue[$month] += $order_amount;
            $monthly_orders[$month]++;
            
            // Đếm theo 7 ngày gần đây
            for ($i = 6; $i >= 0; $i--) {
                $check_date = date('Y-m-d', strtotime("-$i days"));
                if ($order_date === $check_date) {
                    $weekly_revenue[6 - $i] += $order_amount;
                    $weekly_orders[6 - $i]++;
                    break;
                }
            }
        }
        
        // Lấy chi tiết đơn hàng để thống kê sản phẩm
        $order_items_list = $orders->get_order_items($order['id']);
        foreach ($order_items_list as $item) {
            $product_id = $item['product_id'];
            $quantity = intval($item['quantity']);
            
            if (!isset($product_sales[$product_id])) {
                $product_sales[$product_id] = [
                    'product_id' => $product_id,
                    'product_name' => $item['product_name'],
                    'total_quantity' => 0,
                    'total_revenue' => 0
                ];
            }
            
            $product_sales[$product_id]['total_quantity'] += $quantity;
            $product_sales[$product_id]['total_revenue'] += ($quantity * floatval($item['product_price']));
        }
    }
    
    // Sắp xếp sản phẩm theo doanh thu
    usort($product_sales, function($a, $b) {
        return $b['total_revenue'] - $a['total_revenue'];
    });
    
    // Lấy top 5 sản phẩm
    $top_products = array_slice($product_sales, 0, 5);
    
    // Gán dữ liệu cho template
    $smarty->assign('total_revenue', $total_revenue);
    $smarty->assign('total_orders', $total_orders);
    $smarty->assign('today_revenue', $today_revenue);
    $smarty->assign('today_orders', $today_orders);
    $smarty->assign('monthly_revenue', implode(',', $monthly_revenue));
    $smarty->assign('monthly_orders', implode(',', $monthly_orders));
    $smarty->assign('weekly_revenue', implode(',', $weekly_revenue));
    $smarty->assign('weekly_orders', implode(',', $weekly_orders));
    $smarty->assign('weekly_labels', implode(',', $weekly_labels));
    $smarty->assign('top_products', $top_products);
    $smarty->assign('recent_orders', array_slice($all_orders, 0, 10)); // 10 đơn hàng gần nhất
    $smarty->assign('pageTitle', 'Báo cáo bán hàng');
    $smarty->assign('mainContent', 'report/sales.tpl');
}

function usersAction($smarty) {
    // Giữ nguyên phần thống kê người dùng hiện tại
    $users = new users();
    $all_users = $users->list_all_sort_by_id(0, '', 'DESC');
    $total_users = count($all_users);
    $today = date('Y-m-d');
    $new_users_today = 0;
    $regular_users = 0;
    $admin_users = 0;
    $monthly_data = array_fill(1, 12, 0);
    $weekly_data = array_fill(0, 7, 0);
    $weekly_labels = [];
    for ($i = 6; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        $weekly_labels[] = "'" . date('d/m', strtotime($date)) . "'";
    }
    foreach ($all_users as $user) {
        if (isset($user['created_at']) && date('Y-m-d', strtotime($user['created_at'])) === $today) {
            $new_users_today++;
        }
        if (isset($user['created_at'])) {
            $month = (int)date('n', strtotime($user['created_at']));
            $monthly_data[$month]++;
            $user_date = date('Y-m-d', strtotime($user['created_at']));
            for ($i = 6; $i >= 0; $i--) {
                $check_date = date('Y-m-d', strtotime("-$i days"));
                if ($user_date === $check_date) {
                    $weekly_data[6 - $i]++;
                    break;
                }
            }
        }
        if (isset($user['role'])) {
            if ($user['role'] === 'admin') {
                $admin_users++;
            } else {
                $regular_users++;
            }
        } else {
            $regular_users++;
        }
    }
    $smarty->assign('users', $all_users);
    $smarty->assign('total_users', $total_users);
    $smarty->assign('new_users_today', $new_users_today);
    $smarty->assign('regular_users', $regular_users);
    $smarty->assign('admin_users', $admin_users);
    $smarty->assign('monthly_data', implode(',', $monthly_data));
    $smarty->assign('weekly_data', implode(',', $weekly_data));
    $smarty->assign('weekly_labels', implode(',', $weekly_labels));
    $smarty->assign('weekly_total', array_sum($weekly_data));
    $smarty->assign('pageTitle', 'Thống kê người dùng');
    $smarty->assign('mainContent', 'report/users.tpl');
}  