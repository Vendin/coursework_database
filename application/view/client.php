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
        <form class="form-center">
            <div style="display: none" id="pri">
                <h3 style="width 500px; color: #777;  margin-top: 200px">Приблизительная стоимость автомобиля <span style=" color: blue; width: 30px" id="p"></span> руб</h3>
                <a href="/home" class="btn-cen btn btn-default">Перейти на главную</a>
            </div>
            <div id="client">
                <h3>Заполните форму клиента.</h3>
                <input style="display: none" type="text" class="form-control" name="uis" id="uis" value="<?=$_SESSION['user_id']?>">
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Введите ваше имя">
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Введите ваше фамилию">
                </div>
                <div class="form-group">
                    <label>Номер паспорта</label>
                    <input type="text" class="form-control" name="number_pas" id="number_pas" placeholder="Введите ваше номер паспорта">
                </div>
                <div class="form-group">
                    <label>Номер телефона</label>
                    <input type="text" class="form-control" name="number_phone" id="number_phone" placeholder="Введите ваше номер телефона">
                </div>
                <p id="save" class="btn-cen btn btn-default">Сохранить</p>
            </div>
            <div style="display: none" id="auto">
                <h3>Заполните форму автомобиля.</h3>
                <div class="form-group">
                    <label>Марка</label>
                    <select class="form-control" name="mark">
                        <option disabled selected>Выберите марку</option>
                        <?php foreach($a_data['list_mark'] as $data): ?>
                            <option value="<?=$data['maid']?>"><?=$data['name_mark']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="display: none" id="mod" class="form-group">
                    <label>Модель</label>
                    <select class="form-control" name="model" id="model" class="form-control">

                    </select>
                </div>
                <div class="form-group">
                    <label>Год выпуска</label>
                    <select class="form-control" name="year">
                        <option disabled selected>Введите год выпуска вашей машины</option>
                        <?php for($i = 2015; $i >= 1980; $i--): ?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <p id="sub"  class="btn-cen btn btn-default">Отправить</p>
            </div>
        </form>
    </div>
</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/client.js"></script>

</body>
</html>
