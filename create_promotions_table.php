<?php
include_once 'config.php';

// Tạo bảng promotions
$sql = "CREATE TABLE IF NOT EXISTS promotions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    discount_type ENUM('percentage', 'fixed') NOT NULL DEFAULT 'percentage',
    discount_value DECIMAL(10,2) NOT NULL,
    min_order_amount DECIMAL(10,2) DEFAULT 0,
    max_discount DECIMAL(10,2) DEFAULT NULL,
    usage_limit INT DEFAULT NULL,
    used_count INT DEFAULT 0,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($db->executeQuery($sql)) {
    echo "✅ Bảng promotions đã được tạo thành công!\n";
} else {
    echo "❌ Lỗi khi tạo bảng promotions: " . mysqli_error($db->link) . "\n";
}

// Tạo bảng promotion_usage để theo dõi việc sử dụng
$sql2 = "CREATE TABLE IF NOT EXISTS promotion_usage (
    id INT AUTO_INCREMENT PRIMARY KEY,
    promotion_id INT NOT NULL,
    user_id INT,
    order_id INT NOT NULL,
    discount_amount DECIMAL(10,2) NOT NULL,
    used_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (promotion_id) REFERENCES promotions(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
)";

if ($db->executeQuery($sql2)) {
    echo "✅ Bảng promotion_usage đã được tạo thành công!\n";
} else {
    echo "❌ Lỗi khi tạo bảng promotion_usage: " . mysqli_error($db->link) . "\n";
}

// Thêm cột promotion_id vào bảng orders
$sql3 = "ALTER TABLE orders ADD COLUMN promotion_id INT NULL, ADD COLUMN discount_amount DECIMAL(10,2) DEFAULT 0, ADD FOREIGN KEY (promotion_id) REFERENCES promotions(id) ON DELETE SET NULL";

if ($db->executeQuery($sql3)) {
    echo "✅ Đã thêm cột promotion_id và discount_amount vào bảng orders!\n";
} else {
    echo "❌ Lỗi khi thêm cột vào bảng orders: " . mysqli_error($db->link) . "\n";
}

echo "\n🎉 Hoàn thành tạo hệ thống khuyến mãi!\n";
?> 