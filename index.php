<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>وزارة الموارد البشرية والتنمية الاجتماعية</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      font-family: 'Tajawal', sans-serif;
      margin: 0;
      background-color: #f9fafb;
      color: #333;
      box-sizing: border-box;
    }

    .top-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px 30px;
      background-color: #ffffff;
      border-bottom: 1px solid #ddd;
      direction: rtl;
    }

    .main-logo {
      height: 90px;
    }

    .search-login-wrapper {
      display: flex;
      align-items: center;
      gap: 25px; /* ✅ مسافة بين البحث وزر الدخول */
      margin-right: auto;
    }

    .search-box {
      background-color: #ffffff;
      padding: 10px 15px;
      border-radius: 30px;
      border: 1px solid #ccc;
      box-shadow: 0 1px 5px rgba(0, 0, 0, 0.07);
      width: 280px; /* ✅ تصغير العرض */
      transition: all 0.3s ease;
    }

    .search-box input {
      width: 100%;
      border: none;
      outline: none;
      border-radius: 25px;
      padding: 10px 18px;
      font-size: 16px;
      font-family: 'Tajawal', sans-serif;
    }

    .error-msg {
      display: block;
      color: red;
      font-size: 13px;
      margin-top: 5px;
      text-align: right;
    }

    .login-button a {
      display: inline-block;
      padding: 10px 20px;
      background-color: #005baa;
      color: white;
      border-radius: 25px;
      font-weight: bold;
      text-decoration: none;
      font-size: 15px;
      transition: background-color 0.3s ease;
    }

    .login-button a:hover {
      background-color: #003f7d;
    }

    .nav-bar {
      background-color: #e3edf9;
      display: flex;
      justify-content: flex-end; /* ✅ يمين */
      padding: 20px 40px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .nav-menu {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }

    .nav-menu li a {
      text-decoration: none;
      color: #003366;
      font-weight: bold;
      font-size: 16px;
      transition: 0.3s;
    }

    .nav-menu li a:hover {
      color: #0074c2;
    }

    .intro-section {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: 60px 30px;
      background-color: #ffffff;
    }

    .intro-image {
      flex: 1 1 50%;
      text-align: center;
    }

    .intro-image img {
      width: 600px;
      max-width: 100%;
      border-radius: 10px;
      height: auto;
    }

    .intro-text {
      flex: 1 1 45%;
      max-width: 500px;
    }

    .intro-text h2 {
      font-size: 26px;
      color: #003366;
      margin-bottom: 15px;
    }

    .intro-text p {
      font-size: 17px;
      line-height: 1.6;
      color: #444;
    }

    .services {
      padding: 40px 20px;
      background-color: #fff;
      text-align: center;
    }

    .service-list {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 25px;
    }

    .service-item {
      background-color: #f0f4f9;
      border: 1px solid #ccc;
      padding: 30px;
      width: 320px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .service-item h3 {
      color: #005baa;
      font-size: 20px;
    }

    .service-item button {
      margin-top: 10px;
      padding: 10px 16px;
      background-color: #005baa;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 15px;
      cursor: pointer;
    }

    .updates-bar {
      background-color: #d4e6fa;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .updates-bar marquee {
      font-weight: bold;
      color: #003366;
      flex-grow: 1;
    }

    .view-all {
      margin-right: 10px;
      color: #003366;
      text-decoration: none;
      font-weight: bold;
    }

    footer {
      background-color: #f0f0f0;
      padding: 30px 15px;
      text-align: center;
    }

    .footer-top {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      gap: 20px;
      margin-bottom: 20px;
    }

    .footer-top h4 {
      margin-bottom: 10px;
      color: #444;
    }

    .app-icons img,
    .social-icons img {
      height: 32px;
      margin: 5px;
      border-radius: 4px;
      cursor: pointer;
    }

    .social-icons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .app-icons {
      display: flex;
      justify-content: center;
    }

    footer p {
      color: #555;
      margin-top: 20px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <!-- ✅ الشريط العلوي -->
  <header class="top-header">
    <img src="images/logo.png" alt="شعار الوزارة" class="main-logo" />

    <div class="search-login-wrapper">
      <div class="search-box" id="searchBox">
        <input type="text" id="searchInput" placeholder="ابحث في الموقع..." />
        <span id="searchError" class="error-msg"></span>
      </div>

      <div class="login-button">
        <?php
        if (isset($_SESSION['user_email'])) {
            echo '<a href="logout.php">خروج</a>';
        } else {
            echo '<a href="login.php"> تسجيل الدخول </a>';
        }
        ?>
      </div>
    </div>
  </header>

  <!-- ✅ شريط التنقل -->
  <nav class="nav-bar">
    <ul class="nav-menu">
      <li><a href="#home">الرئيسية</a></li>
      <li><a href="#about">من نحن</a></li>
      <li><a href="#services">خدماتنا</a></li>
      <li><a href="#news">الأخبار</a></li>
      <li><a href="#contact">تواصل معنا</a></li>
    </ul>
  </nav>

  <!-- ✅ المقدمة -->
  <section class="intro-section" id="home">
    <div class="intro-image">
      <img src="images/place-image.jpg" alt="صورة للمكان" />
    </div>
    <div class="intro-text" id="about">
      <h2>فرع الوزارة في مدينة الدمام</h2>
      <p>يقدم خدمات مميزة للمواطنين والمقيمين بكل احترافية واهتمام، ضمن بيئة متطورة وخدمة إلكترونية شاملة.</p>
    </div>
  </section>

  <!-- ✅ الخدمات -->
  <section class="services" id="services">
    <h2>الخدمات الإلكترونية</h2>
    <div class="service-list">
      <div class="service-item">
        <h3>خدمة حجز موعد</h3>
        <p>احجز موعدك في أحد فروع الوزارة بكل سهولة.</p>
        <button>عرض التفاصيل</button>
      </div>
      <div class="service-item">
        <h3>الاستعلام عن معاملة</h3>
        <p>تتبع حالة معاملتك في أي وقت.</p>
        <button>عرض التفاصيل</button>
      </div>
      <div class="service-item">
        <h3>تقديم شكوى</h3>
        <p>ارفع شكوى رسمية واحصل على الرد في أسرع وقت.</p>
        <button>عرض التفاصيل</button>
      </div>
    </div>
  </section>

  <!-- ✅ آخر المستجدات -->
  <section class="updates-bar" id="news">
    <marquee direction="right" scrollamount="5">
      📌 إطلاق بوابة التوظيف الموحدة | 📢 تمديد فترة التقديم على دعم الأسر المنتجة | 💼 برنامج التمكين المهني يبدأ قريبًا
    </marquee>
    <a href="#" class="view-all">عرض الكل ➤</a>
  </section>

  <!-- ✅ التذييل -->
  <footer id="contact">
    <div class="footer-top">
      <div>
        <h4>تطبيقات الوزارة</h4>
        <div class="app-icons">
          <img src="images/apple.png" alt="Apple">
          <img src="images/google-play.png" alt="Google Play">
          <img src="images/huawei.png" alt="Huawei">
        </div>
      </div>

      <div>
        <h4>تابعنا على</h4>
        <div class="social-icons">
          <img src="images/facebook.png" alt="Facebook">
          <img src="images/snapchat.png" alt="Snapchat">
          <img src="images/tiktok.png" alt="TikTok">
          <img src="images/x.png" alt="X">
          <img src="images/instagram.png" alt="Instagram">
          <img src="images/youtube.png" alt="YouTube">
          <img src="images/linkedin.png" alt="LinkedIn">
        </div>
      </div>
    </div>
    <p>جميع الحقوق محفوظة لموقع وزارة الموارد البشرية والتنمية الاجتماعية © 2025</p>
  </footer>

  <!-- ✅ البحث الذكي -->
  <script>
    const searchInput = document.getElementById("searchInput");
    const searchError = document.getElementById("searchError");

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
  </script>

</body>
</html>
