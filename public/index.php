<p style="display: none;">
    RewriteEngine on
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?route=$1 [L,QSA]
</p>

<?php
include "../application/includes/startup.php";
include '../application/Router.php';



//$db = new PDO('mysql:host=localhost;dbname=auto', 'root', 'root');
//
//$registry->set ('db', $db);
$router = new Router($registry);

$registry->set ('router', $router);

$router->setPath (site_path . 'controllers');

$router->delegate();




