-- Отключаем проверку ключей на время удаления, чтобы не было конфликтов
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS pets;
DROP TABLE IF EXISTS breeds;
DROP TABLE IF EXISTS species;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. Справочник видов (Собака, Кот и т.д.)
CREATE TABLE species (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Справочник пород (Связан с видом)
CREATE TABLE breeds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    species_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    CONSTRAINT fk_breed_species FOREIGN KEY (species_id) 
        REFERENCES species(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Основная таблица питомцев
CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    breed_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    birth_date DATE,
    image_path VARCHAR(255) DEFAULT 'default_pet.jpg', -- Путь к картинке
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_pet_breed FOREIGN KEY (breed_id) 
        REFERENCES breeds(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO species (name) VALUES ('Собака'), ('Кот');

INSERT INTO breeds (species_id, name) VALUES 
(1, 'Золотистый ретривер'), 
(1, 'Немецкая овчарка'),
(2, 'Сиамская'),
(2, 'Мейн-кун');

INSERT INTO pets (breed_id, name, gender, birth_date, description) VALUES 
(1, 'Рекс', 'male', '2022-05-15', 'Очень добрый и активный пес.'),
(3, 'Мурка', 'female', '2023-01-10', 'Тихая любительница поспать.');