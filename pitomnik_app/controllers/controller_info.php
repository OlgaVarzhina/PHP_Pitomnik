<?php
class Controller_Info extends Controller {

    public function action_contacts() {
        $title = "Контакты — Лапоухий Дом";
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/contacts_view.php';
        include __DIR__ . '/../views/footer.php';
    }

    public function action_stories() {
        $title = "Счастливые истории — Лапоухий Дом";
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/stories_view.php';
        include __DIR__ . '/../views/footer.php';
    }

    public function action_guide() {
        $title = "Как забрать друга — Лапоухий Дом";
        include __DIR__ . '/../views/header.php';
        include __DIR__ . '/../views/guide_view.php';
        include __DIR__ . '/../views/footer.php';
    }
}