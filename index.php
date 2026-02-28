<?php
// index.php (Предполагаемый роутер)//В_Процессе

$request = $_SERVER['REQUEST_URI'];
// Убираем лишние параметры, если они есть (все после ?)
$path = parse_url($request, PHP_URL_PATH);

// Маршрутизация (Аналог urlpatterns)
switch ($path) {
    case '/':
    case '/home':
        require 'views/catalog.php'; // Главная страница
        break;

    case '/about':
        require 'views/about.php';
        break;

    // Динамический роут для питомца (как path('pet/<int:id>/', ...))
    default:
        if (preg_match('/^\/pet\/(\[0-9]+)$/', $path, $matches)) {
            $pet_id = $matches[1]; // Забираем ID из URL
            require 'views/pet_detail.php';
        } else {
            http_response_code(404);
            echo "404 — Мы не нашли такого хвостика";
        }
        break;
}