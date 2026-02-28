<?php
class Route {
    public static function start() {
        $controller_name = 'Main';
        $action_name = 'index';
        $id = null;

        // Важно: отсекаем параметры после знака ? через parse_url 
        $request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routes = explode('/', trim($request_uri, '/'));

        if (!empty($routes[0])) {
            $controller_name = ucfirst($routes[0]); 
        }

        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $id = $routes[2];
        }

        $controller_class_name = 'Controller_' . $controller_name;
        $action_method_name = 'action_' . $action_name;

        // Подключаем модель
        $model_path = __DIR__ . "/../models/" . strtolower('Model_' . $controller_name) . ".php";
        if (file_exists($model_path)) {
            include_once $model_path;
        }

        $controller_path = __DIR__ . "/../controllers/" . strtolower($controller_class_name) . ".php";

        if (file_exists($controller_path)) {
            include_once $controller_path;
            $controller = new $controller_class_name;
            
            if (method_exists($controller, $action_method_name)) {
                $controller->$action_method_name($id);
            } else {
                self::ErrorPage404("Метод $action_method_name не найден");
            }
        } else {
            self::ErrorPage404("Контроллер $controller_class_name не найден");
        }
    }

    public static function ErrorPage404($message = "") {
        header('HTTP/1.1 404 Not Found');
        die("404 - " . $message);
    }
}