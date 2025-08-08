<?php
session_start();
if (!isset($_SESSION["user_email"]) || $_SESSION["user_role"] !== "trainee") {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة تحكم المتدرب</title>
  <link rel="stylesheet" href="style.css" />

</head>
<body>
  <h2>مرحبًا يا <?= htmlspecialchars($_SESSION["user_name"]) ?> 🎓</h2>
  <p>أنت الآن في لوحة تحكم <strong>المتدرب</strong>.</p>
  <a href="logout.php">تسجيل الخروج</a>
</body>
</html>
