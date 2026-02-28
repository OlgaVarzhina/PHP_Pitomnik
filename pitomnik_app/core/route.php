<?php
// pitomnik_app/core/route.php

class Route {
    public static function start() {
        // 1. Настройки по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $id = null;

        // 2. Разбираем URL
        // trim($url, '/') убирает лишние слэши по краям
        $routes = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        // Получаем контроллер (например, localhost/pet -> pet)
        if (!empty($routes[0])) {
            $controller_name = ucfirst($routes[0]);
        }

        // Получаем экшен (например, localhost/pet/view -> view)
        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }

        // Получаем ID (например, localhost/pet/view/1 -> 1)
        if (!empty($routes[2])) {
            $id = $routes[2];
        }

        // 3. Формируем имена
        $controller_class_name = 'Controller_' . $controller_name;
        $action_method_name = 'action_' . $action_name;
        $model_name = 'Model_' . $controller_name;

        // 4. Подключаем модель (если есть)
        $model_path = __DIR__ . "/../models/" . strtolower($model_name) . ".php";
        if (file_exists($model_path)) {
            include_once $model_path;
        }

        // 5. Подключаем контроллер
        $controller_path = __DIR__ . "/../controllers/" . strtolower($controller_class_name) . ".php";

        if (file_exists($controller_path)) {
            include_once $controller_path;
            
            $controller = new $controller_class_name;
            
            if (method_exists($controller, $action_method_name)) {
                // ВЫЗЫВАЕМ ОДИН РАЗ с передачей ID
                $controller->$action_method_name($id);
            } else {
                die("Ошибка: Метод $action_method_name не найден в классе $controller_class_name");
            }
        } else {
            // Если контроллер не найден, можно перенаправить на 404
            die("Ошибка: Файл контроллера не найден по пути $controller_path");
        }
    }
}