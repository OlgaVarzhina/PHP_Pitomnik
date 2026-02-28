<?php
class Controller_Pet extends Controller {
    function __construct() {
        parent::__construct();
        $this->model = new Model_Pet();
    }

    public function action_view($id) {
        if (!$id) {
            die("ID животного не указан");
        }

        $pet = $this->model->get_pet_data($id);

        if (!$pet) {
            die("Питомец с ID $id не найден в базе");
        }

        $title = "Питомец: " . $pet['name'];
        
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/pet_view.php'; // Наша новая детальная страница
        include __DIR__ . '/../views/footer.php';
    }
}