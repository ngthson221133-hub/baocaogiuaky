<?php
include 'config.php';
global $db;

echo "=== KIỂM TRA DỮ LIỆU ĐƠN HÀNG ===\n\n";

// Kiểm tra số lượng đơn hàng
$result = $db->executeQuery_list('SELECT COUNT(*) as count FROM orders');
echo "Tổng số đơn hàng: " . $result[0]['count'] . "\n";

// Kiểm tra doanh thu tổng
$result = $db->executeQuery_list('SELECT SUM(total_amount) as total FROM orders');
$total_revenue = $result[0]['total'] ?? 0;
echo "Tổng doanh thu: " . number_format($total_revenue, 0, ',', '.') . "đ\n";

// Kiểm tra đơn hàng hôm nay
$today = date('Y-m-d');
$result = $db->executeQuery_list("SELECT COUNT(*) as count, SUM(total_amount) as total FROM orders WHERE DATE(created_at) = '$today'");
echo "Đơn hàng hôm nay: " . $result[0]['count'] . "\n";
echo "Doanh thu hôm nay: " . number_format($result[0]['total'] ?? 0, 0, ',', '.') . "đ\n\n";

// Hiển thị 5 đơn hàng gần nhất
echo "=== 5 ĐƠN HÀNG GẦN NHẤT ===\n";
$result = $db->executeQuery_list('SELECT o.*, u.username FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.created_at DESC LIMIT 5');

if ($result) {
    foreach ($result as $order) {
        echo "ID: " . $order['id'] . " | ";
        echo "Khách hàng: " . ($order['username'] ?? 'Khách') . " | ";
        echo "Tổng tiền: " . number_format($order['total_amount'], 0, ',', '.') . "đ | ";
        echo "Trạng thái: " . $order['status'] . " | ";
        echo "Ngày: " . $order['created_at'] . "\n";
    }
} else {
    echo "Không có đơn hàng nào\n";
}

echo "\n=== KIỂM TRA CHI TIẾT ĐƠN HÀNG ===\n";
$result = $db->executeQuery_list('SELECT COUNT(*) as count FROM order_items');
echo "Tổng số sản phẩm đã bán: " . $result[0]['count'] . "\n";

// Kiểm tra cấu trúc bảng order_items
echo "\n=== CẤU TRÚC BẢNG ORDER_ITEMS ===\n";
$result = $db->executeQuery_list('DESCRIBE order_items');
if ($result) {
    foreach ($result as $column) {
        echo "Cột: " . $column['Field'] . " | Kiểu: " . $column['Type'] . "\n";
    }
}

// Top sản phẩm bán chạy
echo "\n=== TOP SẢN PHẨM BÁN CHẠY ===\n";
$result = $db->executeQuery_list('
    SELECT oi.product_name, SUM(oi.quantity) as total_quantity, SUM(oi.quantity * oi.product_price) as total_revenue
    FROM order_items oi
    GROUP BY oi.product_id, oi.product_name
    ORDER BY total_revenue DESC
    LIMIT 5
');

if ($result) {
    foreach ($result as $product) {
        echo "Sản phẩm: " . $product['product_name'] . " | ";
        echo "Số lượng: " . $product['total_quantity'] . " kg | ";
        echo "Doanh thu: " . number_format($product['total_revenue'], 0, ',', '.') . "đ\n";
    }
} else {
    echo "Không có dữ liệu sản phẩm\n";
}
?> 