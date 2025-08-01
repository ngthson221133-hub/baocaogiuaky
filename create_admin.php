<?php
require 'config.php';
global $db;

// Đảm bảo cột role đã có
$sql = "ALTER TABLE users ADD COLUMN role VARCHAR(20) DEFAULT 'user'";
try {
    $db->executeQuery($sql);
} catch (Exception $e) {}

// Cập nhật role cho tài khoản admin
$db->record_update('users', array('role'=>'admin'), "email = 'admin'");
echo "Đã cập nhật role cho tài khoản admin!\n"; 