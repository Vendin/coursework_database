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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
        </div>
    <?php endif; ?>
    </div>
</nav>

<div class="container-body row">
    <div style="margin: 1% 20%">
        <h2 style="text-align: center; margin: 30px;">Список отчетов:</h2>
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Дата начла</th>
                <th>Дата конца</th>
                <th>Дата создания</th>
            </tr>
            <?php foreach($a_data['lists']  as $k => $a): ?>
                <tr>
                    <th id="aj">
                        <form method="POST" action="otchet">
                            <input style="display: none" type="text" name="number" value="<?=$a['id']?>">
                            <input type="submit"value="<?=$k + 1?>">
                        </form>
                    </th>
                    <th><?=$a['start_date']?></th>
                    <th><?=$a['end_date']?></th>
                    <th><?=$a['dt_create']?></th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/client.js"></script>
<script src="../js/lists.js"></script>


</body>
</html>
