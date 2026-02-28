<?php
// pitomnik_app/core/controller.php

class Controller {
    
    public $model;
    public $view;
    
    function __construct()
    {
        // Пока мы не используем сложный View-класс, 
        // но по стандарту MVC он инициализируется здесь
        $this->view = new View();
    }
    
    // Этот метод будет переопределяться в дочерних контроллерах
    function action_index()
    {
    }
}