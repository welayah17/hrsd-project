<?php
session_start();

// بيانات تسجيل دخول وهمية (ثابتة)
$users = [
    // البريد => [كلمة المرور, الدور, الاسم الكامل]
    "ali@hrsd.gov.sa"     => ["123456", "employee", "علي"],
    "mahmoud@hrsd.gov.sa" => ["admin123", "admin", "محمود"],
    "welayah@hrsd.gov.sa" => ["trainee22", "trainee", "ولايه"],
];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isset($users[$email]) && $users[$email][0] === $password) {
        // ✅ تسجيل دخول ناجح
        $_SESSION["user_email"] = $email;
        $_SESSION["user_role"] = $users[$email][1];
        $_SESSION["user_name"] = $users[$email][2]; // ← السطر المهم

        // إعادة التوجيه حسب الدور
        switch ($_SESSION["user_role"]) {
            case "admin":
                header("Location: admin_dashboard.php");
                exit;
            case "employee":
                header("Location: employee_dashboard.php");
                exit;
            case "trainee":
                header("Location: trainee_dashboard.php");
                exit;
            default:
                header("Location: index.php");
                exit;
        }
    } else {
        $error = "⚠️ البريد الإلكتروني أو كلمة المرور غير صحيحة.";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>تسجيل الدخول</title>

  <style>
    body {
      font-family: 'Tajawal', sans-serif;
      background-color: #f0f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      background: white;
      padding: 30px 40px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      width: 360px;
    }
    h2 {
      margin-bottom: 20px;
      color: #005baa;
      text-align: center;
    }
    label {
      display: block;
      margin: 15px 0 5px;
      font-weight: bold;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      box-sizing: border-box;
    }
    button {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background-color: #005baa;
      border: none;
      border-radius: 25px;
      color: white;
      font-size: 17px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #003f7d;
    }
    .error-msg {
      color: red;
      margin-top: 15px;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>تسجيل الدخول</h2>

    <?php if ($error): ?>
      <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="">
      <label for="email">البريد الإلكتروني</label>
      <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني" />

      <label for="password">كلمة المرور</label>
      <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور" />

      <button type="submit">دخول</button>
    </form>
  </div>

</body>
</html>

