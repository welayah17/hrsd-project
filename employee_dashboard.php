<?php
session_start();

// التحقق من تسجيل الدخول والدور
if (!isset($_SESSION["user_email"]) || $_SESSION["user_role"] !== "employee") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>لوحة تحكم الموظف</title>
  <link rel="stylesheet" href="style.css" />
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const searchError = document.getElementById("searchError");
      if (searchInput) {
        const validLinks = {
          "الرئيسية": "#home",
          "من نحن": "#about",
          "خدماتنا": "#services",
          "الأخبار": "#news",
          "تواصل معنا": "#contact"
        };
        searchInput.addEventListener("keyup", function () {
          const keyword = searchInput.value.trim();
          let found = false;
          for (let key in validLinks) {
            if (key.includes(keyword)) {
              window.location.href = validLinks[key];
              found = true;
              searchError.textContent = "";
              break;
            }
          }
          if (!found && keyword.length > 1) {
            searchError.textContent = "⚠️ لم يتم العثور على نتيجة مطابقة.";
          } else {
            searchError.textContent = "";
          }
        });
      }
    });
  </script>
</head>
<body>

<?php include 'header.php'; ?>

<main style="padding: 30px;">
  <h2>مرحبًا يا <?= htmlspecialchars($_SESSION["user_name"]) ?> 🧑‍💼</h2>
  <p>أنت الآن في لوحة تحكم <strong>الموظف</strong>.</p>
  <a href="logout.php">تسجيل الخروج</a>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
