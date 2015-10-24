<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Главная</title>
    <script src="javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="javascript/home.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="css/home.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>




<div id="home" style="width: 100%; padding: 0; margin-bottom: 0px;" class="homepage-hero-module jumbotron">
    <div class="parent">
        <div class="video-container">
            <div class="filter" style="width: 840px; margin-top: 0px; height: 769px;">


                <div class="parent">
                    <form action="test.php" method="POST">
                        <div style="border-radius: 20px; width: 650px; height: 330px; background: rgba(0, 0, 0, 0.5);">
                            <div style="margin: 0 auto; width: 350px; padding: 20px;" class="form-group">
                                <label style="display:block; text-align: center; color: white" for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div style="margin: 0 auto; width: 350px; padding: 20px;" class="form-group">
                                <label style="display:block; text-align: center; color: white" for="exampleInputPassword1">Пароль</label>
                                <div class="input-group">
                                <input name="password" type="password" class="form-control pwd" id="exampleInputPassword1" placeholder="Пароль">
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal" type="button"><span class="glyphicon glyphicon-eye-open"></span></button>
                                </span>
                                </div>
                            </div>


                            <div style="display: block; margin: 0 auto;width: 350px; padding: 40px;" class="form-group">
                                <button style="display: block; margin: 0 auto; color: rgba(0, 0, 0, 0.5); width: 150px;" type="submit" class="btn btn-default">Войти</button>
                            </div>
                    </form>


                </div>

                </div>
            </div>
            <video autoplay="" loop="" class="fadeIn animated" poster="https://s3-us-west-2.amazonaws.com/coverr/poster/Street-View.jpg" style="width: 1440px; margin-top: 0px; height: 100% !important; background-color: black;">
                <source src="https://s3-us-west-2.amazonaws.com/coverr/mp4/Street-View.mp4" type="video/mp4">Your browser does not support the video tag. I suggest you upgrade your browser.
                <source src="https://s3-us-west-2.amazonaws.com/coverr/mp4/Street-View.webm" type="video/webm">Your browser does not support the video tag. I suggest you upgrade your browser.
            </video>
        </div>
    </div>
</div>
</body>

</html>