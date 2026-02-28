<?php
// pitomnik_app/bootstrap.php

// 1. Конфиг БД
$db_host = 'localhost';
$db_name = 'pet_db';
$db_user = 'root';
$db_pass = '1234'; 

try {
    // 2. Создаем подключение
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}

// 3. Подключаем БАЗОВЫЕ классы (Родители)
// Важно: сначала подключаем тех, от кого будем наследоваться
require_once __DIR__ . '/core/model.php';
require_once __DIR__ . '/core/view.php';
require_once __DIR__ . '/core/controller.php'; // <--- Вот он, "папа" всех контроллеров

// 4. Подключаем роутер (Двигатель)
require_once __DIR__ . '/core/route.php';

// 5. И только когда ВСЕ базовые классы загружены — запускаем систему
Route::start();