<?php
session_start();
session_unset(); // حذف جميع البيانات
session_destroy(); // تدمير الجلسة
header("Location: login.php"); // الرجوع إلى صفحة الدخول
exit;
