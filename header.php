<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>نظام الموارد البشرية</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <header class="top-header">
    <img src="images/logo.png" alt="الشعار" class="main-logo" />
    <div class="search-container">
      <div class="search-box">
        <input type="text" id="searchInput" placeholder="ابحث هنا..." />
      </div>
      <span id="searchError" class="error-msg"></span>
    </div>
    <div class="login-box">
      <?php if (isset($_SESSION["user_email"])): ?>
        مرحباً، <?= htmlspecialchars($_SESSION["user_name"] ?? $_SESSION["user_email"]) ?>
        | <a href="logout.php">تسجيل الخروج</a>
      <?php else: ?>
        <a href="login.php">تسجيل الدخول</a>
      <?php endif; ?>
    </div>
  </header>
  <nav class="nav-bar">
    <ul class="nav-menu">
      <li><a href="index.php">الرئيسية</a></li>
      <li><a href="#about">من نحن</a></li>
      <li><a href="#services">خدماتنا</a></li>
      <li><a href="#news">الأخبار</a></li>
      <li><a href="#contact">تواصل معنا</a></li>
    </ul>
  </nav>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const searchError = document.getElementById("searchError");
      if (searchInput) {
        const validLinks = {
          "الرئيسية": "index.php",
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
