<?php
// pitomnik_app/models/model_pet.php

class Model_Pet extends Model {

    /**
     * Получает данные конкретного питомца по ID
     * @param int $id
     */
    public function get_pet_by_id($id) {
        try {
            $sql = "SELECT 
                        p.*, 
                        b.name as breed_name, 
                        s.name as species_name 
                    FROM pets p
                    JOIN breeds b ON p.breed_id = b.id
                    JOIN species s ON b.species_id = s.id
                    WHERE p.id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}