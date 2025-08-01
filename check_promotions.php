<?php
include_once 'config.php';

// Kiểm tra các mã khuyến mãi đã có
$sql = "SELECT * FROM promotions ORDER BY created_at DESC";
$result = $db->executeQuery_list($sql);

echo "📋 Danh sách mã khuyến mãi hiện có:\n\n";

if ($result) {
    foreach ($result as $promotion) {
        echo "🔸 Mã: {$promotion['code']}\n";
        echo "   Tên: {$promotion['name']}\n";
        echo "   Loại: " . ($promotion['discount_type'] == 'percentage' ? 'Phần trăm' : 'Cố định') . "\n";
        echo "   Giá trị: " . ($promotion['discount_type'] == 'percentage' ? $promotion['discount_value'] . '%' : number_format($promotion['discount_value'], 0, ',', '.') . 'đ') . "\n";
        echo "   Trạng thái: " . ($promotion['is_active'] ? 'Hoạt động' : 'Tạm dừng') . "\n";
        echo "   Đã dùng: {$promotion['used_count']}\n";
        echo "   Ngày hiệu lực: {$promotion['start_date']} đến {$promotion['end_date']}\n";
        echo "   Tạo lúc: {$promotion['created_at']}\n";
        echo "   " . str_repeat("-", 50) . "\n";
    }
} else {
    echo "❌ Chưa có mã khuyến mãi nào\n";
}

echo "\n🎯 Tổng cộng: " . count($result) . " mã khuyến mãi\n";
?> 