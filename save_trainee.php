<?php
$host = 'localhost';
$dbname = 'hrsd';
$user = 'root';
$pass = '';

// الاتصال
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// حفظ البيانات
$stmt = $pdo->prepare("INSERT INTO trainees (name, email, phone, university, id_number, gpa, major, level)
VALUES (:name, :email, :phone, :university, :id_number, :gpa, :major, :level)");

$stmt->execute([
  ':name' => $_POST['name'],
  ':email' => $_POST['email'],
  ':phone' => $_POST['phone'],
  ':university' => $_POST['university'],
  ':id_number' => $_POST['id_number'],
  ':gpa' => $_POST['gpa'],
  ':major' => $_POST['major'],
  ':level' => $_POST['level']
]);

echo "✅ تم تسجيل المتدرب بنجاح!";
?>
