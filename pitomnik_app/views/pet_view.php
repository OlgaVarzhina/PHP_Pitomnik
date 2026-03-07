<?php
/**
 * Детальная карточка питомца
 * Переменная $pet передается из Controller_Pet
 */
?>

<div class="pet-detail-wrapper">
    <div class="container">
        <a href="/" class="back-link">
            <span class="arrow">←</span> Вернуться к списку хвостиков
        </a>

        <article class="pet-detail-card">
            <div class="pet-detail-image">
                <?php $img = !empty($pet['image_path']) ? $pet['image_path'] : '/static/images/no-photo.jpg'; ?>
                <img src="<?= $img ?>" alt="<?= htmlspecialchars($pet['name']) ?>">
                
                <div class="pet-status-badge <?= htmlspecialchars($pet['status']) ?>">
                    <?= ($pet['status'] === 'available') ? '🐾 Ищет семью' : '🏥 На реабилитации' ?>
                </div>
            </div>

            <div class="pet-detail-info">
                <header class="detail-header">
                    <span class="species-tag"><?= htmlspecialchars($pet['species_name']) ?></span>
                    <h1>Меня зовут <?= htmlspecialchars($pet['name']) ?></h1>
                    <p class="breed-text"><?= htmlspecialchars($pet['breed_name']) ?></p>
                </header>

                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">🎂</div>
                        <div class="stat-content">
                            <span class="stat-label">Возраст</span>
                            <span class="stat-value"><?= (int)$pet['age'] ?> года/лет</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">🛡️</div>
                        <div class="stat-content">
                            <span class="stat-label">Здоровье</span>
                            <span class="stat-value">Привит, здоров</span>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">🏠</div>
                        <div class="stat-content">
                            <span class="stat-label">Размер</span>
                            <span class="stat-value">Средний</span>
                        </div>
                    </div>
                </div>

                <div class="full-description">
                    <h3>Моя история</h3>
                    <p>
                        <?= !empty($pet['description']) 
                            ? nl2br(htmlspecialchars($pet['description'])) 
                            : "Этот хвостик пока стесняется рассказать свою историю, но он очень хочет найти любящих хозяев и подарить им свою преданность." 
                        ?>
                    </p>
                </div>

                <div class="detail-actions">
                    <button class="btn-cta" onclick="alert('Мы получили ваш запрос! Наш куратор свяжется с вами в ближайшее время.')">
                        Стать семьей для <?= htmlspecialchars($pet['name']) ?>
                    </button>
                    <p class="action-notice">Нажимая кнопку, вы подтверждаете готовность к ответственному содержанию.</p>
                </div>
            </div>
        </article>
    </div>
</div>