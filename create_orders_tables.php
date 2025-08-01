<?php
include_once 'config.php';

echo "<h2>Tạo bảng orders và order_items</h2>";

// Tạo bảng orders
$sql_orders = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    guest_email VARCHAR(255),
    guest_name VARCHAR(255),
    guest_phone VARCHAR(20),
    total_amount DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'confirmed', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
    shipping_address TEXT,
    payment_method ENUM('cod', 'bank_transfer', 'online') DEFAULT 'cod',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
)";

$result_orders = $db->executeQuery($sql_orders);

if ($result_orders) {
    echo "✓ Đã tạo bảng orders thành công!<br>";
} else {
    echo "✗ Lỗi tạo bảng orders<br>";
}

// Tạo bảng order_items
$sql_order_items = "CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";

$result_order_items = $db->executeQuery($sql_order_items);

if ($result_order_items) {
    echo "✓ Đã tạo bảng order_items thành công!<br>";
} else {
    echo "✗ Lỗi tạo bảng order_items<br>";
}

// Hiển thị cấu trúc bảng
echo "<h3>Cấu trúc bảng orders:</h3>";
$describe_orders = $db->executeQuery_list("DESCRIBE orders");
if ($describe_orders) {
    echo "<table border='1' style='border-collapse:collapse;margin:10px 0;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    foreach ($describe_orders as $row) {
        echo "<tr>";
        echo "<td>{$row['Field']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['Null']}</td>";
        echo "<td>{$row['Key']}</td>";
        echo "<td>{$row['Default']}</td>";
        echo "<td>{$row['Extra']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<h3>Cấu trúc bảng order_items:</h3>";
$describe_order_items = $db->executeQuery_list("DESCRIBE order_items");
if ($describe_order_items) {
    echo "<table border='1' style='border-collapse:collapse;margin:10px 0;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    foreach ($describe_order_items as $row) {
        echo "<tr>";
        echo "<td>{$row['Field']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['Null']}</td>";
        echo "<td>{$row['Key']}</td>";
        echo "<td>{$row['Default']}</td>";
        echo "<td>{$row['Extra']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<p style='color:green;font-weight:bold;'>Hoàn thành tạo bảng orders và order_items!</p>";
?> 