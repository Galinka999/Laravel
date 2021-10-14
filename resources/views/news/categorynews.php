<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Euronews.Главная</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
</head>
<body>
<div class="wrapper">
    <div class="menu">
        <h1>Euronews</h1>
        <p><a href="<?=route('auth')?>">Войти в личный кабинет</a></p>
    </div>

        <h2><a href="<?=route('news.index')?>"><?= $category[0]?></a></h2>
        <h2><a href="<?=route('news.index')?>"><?= $category[1]?></a></h2>
        <h2><a href="<?=route('news.index')?>"><?= $category[2]?></a></h2>
        <h2><a href="<?=route('news.index')?>"><?= $category[3]?></a></h2>
        <h2><a href="<?=route('news.index')?>"><?= $category[4]?></a></h2>

</div>
</body>
