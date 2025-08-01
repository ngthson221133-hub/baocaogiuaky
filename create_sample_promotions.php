<?php
include_once 'config.php';

// Tạo một số mã khuyến mãi mẫu
$sample_promotions = [
    [
        'code' => 'SALE20',
        'name' => 'Giảm giá 20% cho đơn hàng đầu tiên',
        'description' => 'Áp dụng cho tất cả sản phẩm, giảm 20% giá trị đơn hàng',
        'discount_type' => 'percentage',
        'discount_value' => 20,
        'min_order_amount' => 100000,
        'max_discount' => 200000,
        'usage_limit' => 50,
        'start_date' => date('Y-m-d'),
        'end_date' => date('Y-m-d', strtotime('+30 days')),
        'is_active' => 1
    ],
    [
        'code' => 'GIAM50K',
        'name' => 'Giảm 50,000đ cho đơn hàng từ 200,000đ',
        'description' => 'Giảm cố định 50,000đ cho đơn hàng có giá trị từ 200,000đ trở lên',
        'discount_type' => 'fixed',
        'discount_value' => 50000,
        'min_order_amount' => 200000,
        'max_discount' => null,
        'usage_limit' => 100,
        'start_date' => date('Y-m-d'),
        'end_date' => date('Y-m-d', strtotime('+60 days')),
        'is_active' => 1
    ],
    [
        'code' => 'WELCOME10',
        'name' => 'Chào mừng khách hàng mới - Giảm 10%',
        'description' => 'Mã khuyến mãi dành cho khách hàng mới, giảm 10% không giới hạn',
        'discount_type' => 'percentage',
        'discount_value' => 10,
        'min_order_amount' => 0,
        'max_discount' => null,
        'usage_limit' => 200,
        'start_date' => date('Y-m-d'),
        'end_date' => date('Y-m-d', strtotime('+90 days')),
        'is_active' => 1
    ]
];

foreach ($sample_promotions as $promotion) {
    $result = $db->record_insert('promotions', $promotion);
    if ($result) {
        echo "✅ Đã tạo mã khuyến mãi: {$promotion['code']} - {$promotion['name']}\n";
    } else {
        echo "❌ Lỗi khi tạo mã khuyến mãi: {$promotion['code']}\n";
    }
}

echo "\n🎉 Hoàn thành tạo mã khuyến mãi mẫu!\n";
echo "Bạn có thể vào Admin Panel > Quản lý khuyến mãi để xem danh sách.\n";
?> 