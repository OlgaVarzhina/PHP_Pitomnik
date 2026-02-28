<?php
class Controller_Pet extends Controller {

    public function __construct() {
        parent::__construct();
        // Убедитесь, что файл модели Model_Pet существует 
        $this->model = new Model_Pet();
    }

    public function action_view($id = null) {
        if (!$id) {
            header("Location: /");
            exit;
        }

        $pet = $this->model->get_pet_by_id($id);

        if (!$pet) {
            die("Питомец с ID " . htmlspecialchars($id) . " не найден.");
        }

        $title = "Познакомьтесь с " . $pet['name'];

        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/pet_view.php';
        include __DIR__ . '/../views/footer.php';
    }
}