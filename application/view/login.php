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
    <title>PHP Ajax Authorization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <?php if (Controller_Auth::isAuthorized()): ?>

        <h1>Your are welcome!</h1>

        <form class="ajax" method="post" action="ajax">
            <input type="hidden" name="act" value="logout">
            <div class="form-actions">
                <button class="btn btn-large btn-primary" type="submit">Logout</button>
            </div>
        </form>

    <?php else: ?>

        <form class="form-signin ajax" method="post" action="ajax">
            <div class="main-error alert alert-error hide"></div>

            <h2 class="form-signin-heading">Please sign in</h2>
            <input name="username" type="text" class="input-block-level" placeholder="Username" autofocus>
            <input name="password" type="password" class="input-block-level" placeholder="Password">
            <label class="checkbox">
                <input name="remember-me" type="checkbox" value="remember-me" checked> Remember me
            </label>
            <input type="hidden" name="act" value="login">
            <button class="btn btn-large btn-primary" type="submit">Sign in</button>

            <div class="alert alert-info" style="margin-top:15px;">
                <p>Not have an account? <a href="/register">Register it.</a>
            </div>
        </form>

    <?php endif; ?>

</div> <!-- /container -->

<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/ajax-form.js"></script>

</body>
</html>
