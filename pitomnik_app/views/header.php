<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Мир Хвостиков' ?></title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<header class="main-header">
    <div class="container header-content">
        <a href="/" class="logo">
            <span class="logo-icon">🐾</span>
            <span class="logo-text">Лапоухий Дом</span>
        </a>
        
        <nav class="main-nav">
            <a href="/">Каталог</a>
            <a href="info/stories">Счастливые истории</a>
            <a href="info/contacts">Контакты</a>
        </nav>

        <div class="header-actions">
            <a href="/donate" class="btn-donate">Помочь кормом</a>
        </div>
    </div>
</header>
