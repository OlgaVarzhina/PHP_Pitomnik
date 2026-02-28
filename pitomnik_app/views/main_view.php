<?php
/**
 * Шаблон главной страницы (Каталог)
 * Принимает массив $pets из контроллера
 */
?>

<div class="filter-container">
    <button class="filter-btn active" data-filter="all">Все лапки</button>
    <button class="filter-btn" data-filter="Собаки">Собаки</button>
    <button class="filter-btn" data-filter="Кошки">Кошки</button>
    <button class="filter-btn" data-filter="Грызуны">Грызуны</button>
</div>

<main class="catalog">
    <?php if (!empty($pets)): ?>
        <?php foreach ($pets as $pet): ?>
            <div class="pet-card" data-category="<?= htmlspecialchars($pet['species_name']) ?>">
                
                <div class="pet-image-container">
                    <?php $img = !empty($pet['image_path']) ? $pet['image_path'] : '/static/images/no-photo.jpg'; ?>
                    <img src="<?= $img ?>" alt="<?= htmlspecialchars($pet['name']) ?>" loading="lazy">
                    
                    <?php if ($pet['status'] !== 'available'): ?>
                        <div class="status-overlay">На лечении</div>
                    <?php endif; ?>
                </div>

                <div class="pet-info">
                    <span class="pet-species"><?= htmlspecialchars($pet['species_name']) ?></span>
                    <h3><?= htmlspecialchars($pet['name']) ?></h3>
                    <p class="pet-breed"><?= htmlspecialchars($pet['breed_name']) ?></p>
                    
                    <div class="pet-meta">
                        <span>Возраст: <?= (int)$pet['age'] ?> г.</span>
                    </div>

                    <a href="/pet/view/<?= $pet['id'] ?>" class="adopt-btn">
                        Познакомиться поближе
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty-state">
            <p>В данный момент в каталоге нет животных. Загляните позже!</p>
        </div>
    <?php endif; ?>
</main>