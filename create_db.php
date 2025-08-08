<?php
$host = 'localhost';
$dbname = 'hrsd';
$user = 'root';
$pass = '';

// الاتصال
$pdo = new PDO("mysql:host=$host", $user, $pass);

// إنشاء قاعدة بيانات إن لم تكن موجودة
$pdo->exec("CREATE DATABASE IF NOT EXISTS hrsd CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

// الاتصال بقاعدة البيانات
$pdo->exec("USE hrsd");

// إنشاء الجدول
$pdo->exec("CREATE TABLE IF NOT EXISTS trainees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(20),
  university VARCHAR(100),
  id_number VARCHAR(20),
  gpa DECIMAL(3,2),
  major VARCHAR(100),
  level VARCHAR(50)
)");

echo "✅ تم إنشاء قاعدة البيانات والجدول بنجاح!";
?>
