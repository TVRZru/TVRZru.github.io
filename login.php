<?php
// Подключение к базе данных
$dbHost = 'localhost';
$dbName = 'database_name';
$dbUser = 'username';
$dbPass = 'password';
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
