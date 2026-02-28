<?php
/**
 * Детальная карточка питомца
 * Переменная $pet передается из Controller_Pet
 */
?>

<div class="pet-detail-wrapper">
    <div class="container">
        <a href="/" class="back-link">← Вернуться к списку хвостиков</a>

        <article class="pet-detail-card">
            <div class="pet-detail-image">
                <?php $img = !empty($pet['image_path']) ? $pet['image_path'] : '/static/images/no-photo.jpg'; ?>
                <img src="<?= $img ?>" alt="<?= htmlspecialchars($pet['name']) ?>">
                
                <div class="pet-status-label <?= htmlspecialchars($pet['status']) ?>">
                    <?= ($pet['status'] === 'available') ? 'Ищет семью' : 'На реабилитации' ?>
                </div>
            </div>

            <div class="pet-detail-info">
                <header>
                    <span class="species-label"><?= htmlspecialchars($pet['species_name']) ?></span>
                    <h1>Меня зовут <?= htmlspecialchars($pet['name']) ?></h1>
                    <p class="breed-title"><?= htmlspecialchars($pet['breed_name']) ?></p>
                </header>

                <div class="stats-grid">
                    <div class="stat-box">
                        <span class="stat-label">Возраст</span>
                        <span class="stat-value"><?= (int)$pet['age'] ?> года/лет</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-label">Здоровье</span>
                        <span class="stat-value">Отличное</span>
                    </div>
                </div>

                <div class="full-description">
                    <h3>Моя история</h3>
                    <p>
                        <?= !empty($pet['description']) 
                            ? nl2br(htmlspecialchars($pet['description'])) 
                            : "Этот хвостик пока стесняется рассказать свою историю, но он очень хочет найти любящих хозяев." 
                        ?>
                    </p>
                </div>

                <div class="detail-actions">
                    <button class="btn-primary-large" onclick="alert('Мы получили ваш запрос! Наш куратор свяжется с вами в ближайшее время.')">
                        Приехать и познакомиться
                    </button>
                    <p class="notice">Находясь у нас, питомец получает лучший уход, но дом ничем не заменить.</p>
                </div>
            </div>
        </article>
    </div>
</div>