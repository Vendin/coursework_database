<?php

if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}

session_start();
require_once '../application/controllers/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная страница</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<nav style="margin-bottom: 0" class="header-home navbar navbar-default" role="navigation">
    <div style="background-color: #ffffff" class="container-fluid">
        <div  class="navbar-header">
            <a class="navbar-brand" href="/home">Система оценки автомобилей</a>
        </div>
        <?php if (Controller_Auth::isAuthorized()): ?>
        <div class="navbar-header navbar-right">
            <a href="/login" type="button" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['login']?></a>
            <?php if($_SESSION['group'] == 2): ?>
                <a href="/register" type="button" class="btn btn-default navbar-btn">Зарегестрировать пользователей</a>
            <?php endif; ?>
        </div>
                <span  class="navbar-left"></span>
            </div>
        <?php else: ?>
            <div class="navbar-header navbar-right">
                <a href="/login" type="button" class="btn btn-default navbar-btn">Войти</a>
            </div>
        <?php endif; ?>
    </div>
</nav>

<div class="container-body row">
    <div class="col-md-4">
        <ul style="text-align: center; margin-top: 120px;" class="list-group">
            <?php if($_SESSION['group'] == 1): ?>
                <li style="width: 200px;" class="list-group-item"><a href="/client">Оценить машину</a></li>
            <?php endif; ?>
            <?php if($_SESSION['group'] >= 3): ?>
                <li style="width: 200px;" class="list-group-item"><a href="/admin/lists">Посмотреть отчеты: "Эффективности сотрудников"</a></li>
            <?php endif; ?>
            <?php if($_SESSION['group'] == 3): ?>
                <li style="width: 200px;" class="list-group-item"><a href="/admin/add">Создать отчет: "Эффективности сотрудников"</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div style="margin-top: 4%;" class="col-md-8">
        <img style="box-shadow: 0 0 15px rgba(0,0,0,0.5); width: 100%; height: 100%; border-radius: 20px;" src="image/home.jpg">
    </div>

</div>

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
