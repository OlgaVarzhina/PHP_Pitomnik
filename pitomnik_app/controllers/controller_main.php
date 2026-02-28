<?php
// pitomnik_app/controllers/controller_main.php

class Controller_Main extends Controller {

    public function __construct() {
        parent::__construct();
        // Инициализируем модель главной страницы
        $this->model = new Model_Main();
    }

    /**
     * Главная страница (Каталог)
     * @param $id - параметр из роутера (для главной обычно null)
     */
    public function action_index($id = null) {
        // Получаем массив данных из модели
        $pets = $this->model->get_all_pets();

        // Данные для мета-тегов
        $title = "Наши питомцы — Приют «Мир Хвостиков»";

        // Подключаем части страницы (Layout)
        // Переменная $pets автоматически станет доступна в main_view.php
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/main_view.php';
        include __DIR__ . '/../views/footer.php';
    }
}