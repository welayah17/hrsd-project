<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل متدرب</title>
  <link rel="stylesheet" href="style.css" />

  <style>
    body {
      font-family: 'Tajawal', sans-serif;
      background-color: #f5f5f5;
      padding: 40px;
    }
    form {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
      margin: auto;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      background-color: #005baa;
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <form action="save_trainee.php" method="POST">
    <h2 style="text-align:center;">تسجيل متدرب</h2>

    <label>الاسم الكامل</label>
    <input type="text" name="name" required>

    <label>البريد الإلكتروني</label>
    <input type="email" name="email" required>

    <label>رقم الجوال</label>
    <input type="text" name="phone" required>

    <label>الجامعة</label>
    <input type="text" name="university" required>

    <label>رقم الهوية</label>
    <input type="text" name="id_number" required>

    <label>المعدل (GPA)</label>
    <input type="number" step="0.01" name="gpa" required>

    <label>التخصص</label>
    <input type="text" name="major" required>

    <label>المستوى الدراسي</label>
    <select name="level" required>
      <option value="">اختر المستوى</option>
      <option value="أولى">أولى</option>
      <option value="ثانية">ثانية</option>
      <option value="ثالثة">ثالثة</option>
      <option value="رابعة">رابعة</option>
      <option value="خريج">خريج</option>
    </select>

    <button type="submit">تسجيل</button>
  </form>

</body>
</html>
