<?php
// pitomnik_app/core/model.php

class Model {
    protected $db;

    public function __construct() {
        // Берем объект PDO из глобальной области видимости
        global $pdo; 
        $this->db = $pdo;
    }

    // Базовый метод, который можно будет переопределять
    public function get_data() {
    }
}