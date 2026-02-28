<?php
// pitomnik_app/models/model_main.php

class Model_Main extends Model {
    
    public function get_species() {
        // Используем $this->db, который мы настроили в базовом классе Model
        $sql = "SELECT * FROM species";
        $query = $this->db->query($sql);
        return $query->fetchAll(); // Возвращает массив всех видов
    }
}