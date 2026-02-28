<?php
$host = 'localhost';
$db   = 'pet_db';
$user = 'root';
$pass = '1234'; // Вставь свой пароль здесь
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Чтобы PHP кидал ошибки (как в Django)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Получаем данные как массив ['name' => 'Рекс']
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Защита от SQL-инъекций на уровне драйвера
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}