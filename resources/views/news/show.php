<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euronews.<?=$news['author']?></title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>
<body>
<div class="wrapper">
    <div class="menu">
        <h1>Euronews</h1>
        <p><a href="<?=route('auth')?>">Войти в личный кабинет</a></p>
    </div>
    <h1>Новость с #ID <?=$news['id']?></h1>
    <p>Автор: <?=$news['author']?></p>
</div>
