<?php
session_start();

// تأكد أن المستخدم مدير
if (!isset($_SESSION["user_email"]) || $_SESSION["user_role"] !== "admin") {
    header("Location: login.php");
    exit;
}

$pdo = new PDO("mysql:host=localhost;dbname=hrsd", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// جلب المتدربين الجدد
$stmt = $pdo->query("SELECT * FROM trainees WHERE notified = 0");
$trainees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>لوحة المدير</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php include 'header.php'; ?>

<main style="padding: 30px;">
  <div style="text-align: right; font-size: 20px; font-weight: bold; color: #003366; margin-bottom: 20px;">
    مرحبًا يا <?= htmlspecialchars($_SESSION["user_name"]) ?> 👑
  </div>

  <h2>طلبات التدريب الجديدة</h2>

  <?php if (count($trainees) === 0): ?>
    <p>لا توجد طلبات تدريب جديدة.</p>
  <?php else: ?>
    <table>
      <tr>
        <th>الاسم</th>
        <th>البريد</th>
        <th>الجامعة</th>
        <th>المعدل</th>
        <th>المستوى</th>
        <th>الإجراء</th>
      </tr>
      <?php foreach ($trainees as $trainee): ?>
        <tr>
          <td><?= htmlspecialchars($trainee['name']) ?></td>
          <td><?= htmlspecialchars($trainee['email']) ?></td>
          <td><?= htmlspecialchars($trainee['university']) ?></td>
          <td><?= htmlspecialchars($trainee['gpa']) ?></td>
          <td><?= htmlspecialchars($trainee['level']) ?></td>
          <td>
            <form method="post" action="approve_trainee.php">
              <input type="hidden" name="id" value="<?= $trainee['id'] ?>">
              <button type="submit" class="approve-btn">تمت المراجعة</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
