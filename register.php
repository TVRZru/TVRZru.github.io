<?php
// Подключение к базе данных
$dbHost = 'free24.beget.com';
$dbName = 'y96786ep_1';
$dbUser = 'y96786ep_1';
$dbPass = '!Rad12712700';
$conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

// Получение данных из формы
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Вставка данных в базу данных
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$name, $email, $password]);

// Перенаправление на страницу после регистрации
header("Location: index.html");
exit;
?>
