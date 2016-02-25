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
            <a class="navbar-brand" href="/">Система</a>
        </div>
        <?php if (Controller_Auth::isAuthorized()): ?>
        <div class="navbar-header navbar-right">
            <a href="/login" type="button" class="btn btn-default navbar-btn">
                <span class="glyphicon glyphicon-user"></span><?=$_SESSION['login']?>
            </a>
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

<button style="margin: 100px 30%;" class="btn" id="title">Button</button>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>
