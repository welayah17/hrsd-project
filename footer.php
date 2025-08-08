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
