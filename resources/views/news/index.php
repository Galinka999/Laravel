<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euronews.Категории новостей</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>
<body>
<div class="wrapper">
    <div class="menu">
        <h1>Euronews</h1>
        <p><a href="<?=route('auth')?>">Войти в личный кабинет</a></p>
    </div>
<?php foreach ($newsList as $news): ?>
    <div>
        <h2>
            <a href="<?=route('news.show', ['id' => intval($news['id'])])?>">
                <?=$news['title']?>
            </a>
        </h2>
        <p>Автор: <?=$news['author']?></p>
        <p><?=$news['description']?></p>
    </div>
<?php endforeach; ?>
</div>
