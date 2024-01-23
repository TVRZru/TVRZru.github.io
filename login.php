<?php
// Подключение к базе данных
$dbHost = '185.50.25.38';
$dbName = 'y96786ep_1';
$dbUser = 'y96786ep_1';
$dbPass = '!Rad12712700';
$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

// Получение данных из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Поиск пользователя в базе данных
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->execute([$email, $password]);
$user = $stmt->fetch();

if ($user) {
  // Авторизация успешна
  session_start();
  $_SESSION['user_id'] = $user['id'];
  header("Location: welcome.php");
  exit;
} else {
  // Неверные учетные данные
  header("Location: login_failed.html");
  exit;
}
?>
