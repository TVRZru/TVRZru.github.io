<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  // Пользователь не авторизован, перенаправляем на страницу входа
  header
    ("Location: login.html");
  exit;
}

// Получение информации о пользователе из базы данных
$userID = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userID]);
$user = $stmt->fetch();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Добро пожаловать!</title>
</head>
<body>
  <h1>Добро пожаловать, <?php echo $user['name']; ?>!</h1>
  <h3>Email: <?php echo $user['email']; ?></h3>
  <a href="logout.php">Выйти</a>
</body>
</html>
