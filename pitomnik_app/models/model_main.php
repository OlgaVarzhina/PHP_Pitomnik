<?php
// pitomnik_app/models/model_main.php

class Model_Main extends Model {

    /**
     * Получает всех питомцев с привязкой к породе и виду животного
     */
    public function get_all_pets() {
        try {
            $sql = "SELECT 
                        p.id, 
                        p.name, 
                        p.age, 
                        p.status, 
                        p.description, 
                        p.image_path,
                        b.name as breed_name, 
                        s.name as species_name 
                    FROM pets p
                    LEFT JOIN breeds b ON p.breed_id = b.id
                    LEFT JOIN species s ON b.species_id = s.id
                    ORDER BY p.id DESC";

            $query = $this->db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Если таблицы еще не созданы или ошибка в SQL
            return [];
        }
    }
}