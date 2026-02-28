<?php
/**
 * Шаблон детальной страницы животного
 * Переменная $pet передается из Controller_Pet
 */
?>

<div class="pet-detail-container">
    <a href="/" class="back-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Назад в каталог
    </a>

    <article class="pet-card-large">
        <div class="pet-image-large">
            <?php 
                // Проверяем наличие фото, если нет - ставим заглушку
                $image = (!empty($pet['image_path'])) ? $pet['image_path'] : '/static/images/no-photo.jpg'; 
            ?>
            <img src="<?= $image ?>" alt="Питомец: <?= htmlspecialchars($pet['name']) ?>">
            
            <div class="status-badge <?= htmlspecialchars($pet['status']) ?>">
                <?php 
                    if ($pet['status'] === 'available') echo 'Ищет дом';
                    elseif ($pet['status'] === 'on_hold') echo 'На лечении';
                    else echo 'Уже в семье';
                ?>
            </div>
        </div>

        <div class="pet-content-large">
            <header class="pet-header">
                <span class="species-tag"><?= htmlspecialchars($pet['species_name']) ?></span>
                <h1><?= htmlspecialchars($pet['name']) ?></h1>
                <p class="breed-text"><?= htmlspecialchars($pet['breed_name']) ?></p>
            </header>

            <div class="characteristics-grid">
                <div class="char-item">
                    <span class="char-label">Возраст</span>
                    <span class="char-value"><?= (int)$pet['age'] ?> года/лет</span>
                </div>
                <div class="char-item">
                    <span class="char-label">Пол</span>
                    <span class="char-value">Не указан</span> </div>
                <div class="char-item">
                    <span class="char-label">Здоровье</span>
                    <span class="char-value">Привит, здоров</span>
                </div>
            </div>

            <div class="pet-description">
                <h3>О питомце</h3>
                <p>
                    <?= !empty($pet['description']) 
                        ? nl2br(htmlspecialchars($pet['description'])) 
                        : "Этот хвостик пока ничего о себе не рассказал, но он очень ждет встречи с вами!" 
                    ?>
                </p>
            </div>

            <div class="pet-actions">
                <button class="adopt-btn-large" onclick="alert('Спасибо! Мы свяжемся с вами для организации встречи.')">
                    Познакомиться с <?= htmlspecialchars($pet['name']) ?>
                </button>
                <p class="help-text">Нажимая кнопку, вы соглашаетесь на обработку персональных данных</p>
            </div>
        </div>
    </article>
</div>