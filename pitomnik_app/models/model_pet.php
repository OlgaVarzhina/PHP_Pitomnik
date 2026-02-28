<?php
class Model_Pet extends Model {
    
    public function get_pet_by_id($id) {
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
    }
}