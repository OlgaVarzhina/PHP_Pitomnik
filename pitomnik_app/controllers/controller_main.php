<?php
// pitomnik_app/controllers/controller_main.php

class Controller_Main extends Controller {

    function __construct() {
        parent::__construct(); // Вызываем конструктор родителя, чтобы создать View
        $this->model = new Model_Main(); // Создаем модель
    }

    public function action_index() {
        // 1. Получаем данные из базы через модель
        $species_list = $this->model->get_species();
        
        $title = "Мир Хвостиков — Каталог";

        // 2. Передаем данные в header (например, для заголовка или меню)
        include __DIR__ . '/../views/header.php';
        
        // 3. Выводим список видов для проверки прямо перед каталогом
        echo "<div style='background: #eee; padding: 10px; margin: 20px;'>";
        echo "<strong>Проверка БД:</strong> Найдено видов животных: " . count($species_list);
        echo "<ul>";
        foreach ($species_list as $item) {
            echo "<li>ID: " . $item['id'] . " — " . $item['name'] . "</li>";
        }
        echo "</ul></div>";

        include __DIR__ . '/../views/main_view.php';
        include __DIR__ . '/../views/footer.php';
    }
}