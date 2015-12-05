<?php

if (!empty($_COOKIE['sid'])) {
    session_id($_COOKIE['sid']);
}

session_start();
require_once '../application/controllers/auth.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Главная страница</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav style="margin-bottom: 0" class="header-home navbar navbar-default" role="navigation">
    <div style="background-color: #ffffff" class="container-fluid">
        <div  class="navbar-header">
            <a class="navbar-brand" href="/home">Система оценки автомобилей</a>
        </div>
        <?php if (Controller_Auth::isAuthorized()): ?>
        <div class="navbar-header navbar-right">
            <a href="/register" type="button" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['login']?></a>
        </div>
        <span  class="navbar-left"></span>


    </div>
    <?php else: ?>
        <div class="navbar-header navbar-right">
            <a href="/login" type="button" class="btn btn-default navbar-btn">Войти</a>
            <a href="/register" type="button" class="btn btn-default navbar-btn">Зарегестрироваться</a>
        </div>
    <?php endif; ?>
    </div>
</nav>

<div class="container-body row">
    <div style="margin: 1% 20%">
        <form class="form-center" action="client/add" method="POST">
            <h3>Заполните форму клиента.</h3>
            <div class="form-group">
                <label>Имя</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Введите ваше имя">
            </div>
            <div class="form-group">
                <label>Фамилия</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Введиье ваше фамилию">
            </div>
            <div class="form-group">
                <label>Номер паспорта</label>
                <input type="text" class="form-control" name="number_pas" id="number_pas" placeholder="Введиье ваше номер паспорта">
            </div>
            <div class="form-group">
                <label>Номер телефона</label>
                <input type="text" class="form-control" name="number_phone" id="number_phone" placeholder="Введиье ваше номер телефона">
            </div>
            <button  type="submit" class="btn-cen btn btn-default">Отправить</button>
        </form>
    </div>
</div>

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
