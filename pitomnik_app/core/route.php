<?php
// pitomnik_app/core/route.php

class Route {
    public static function start() {
        // Логика разбора URL (контроллер, экшн)
        // По умолчанию идем на Main
        $controller_name = 'Main';
        $action_name = 'index';

        // Разбираем строку запроса (например, /staff/index)
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // Получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // Получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // Добавляем префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_class_name = 'Controller_' . $controller_name;
        $action_method_name = 'action_' . $action_name;

        // Подцепляем файл модели (если есть)
        $model_file = strtolower($model_name) . '.php';
        $model_path = __DIR__ . "/../models/" . $model_file;
        if (file_exists($model_path)) {
            include $model_path;
        }

        // Подцепляем файл контроллера
        $controller_file = strtolower($controller_class_name) . '.php';
        $controller_path = __DIR__ . "/../controllers/" . $controller_file;

        if (file_exists($controller_path)) {
            include $controller_path;
            
            // Создаем контроллер и вызываем экшен
            $controller = new $controller_class_name;
            if (method_exists($controller, $action_method_name)) {
                $controller->$action_method_name();
            } else {
                die("Action $action_method_name не найден!");
            }
        } else {
            die("Контроллер $controller_class_name не найден по пути $controller_path");
        }
    }
}