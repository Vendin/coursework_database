

<?php
    include "../application/includes/startup.php";
    include '../application/classes/router.php';


    $router = new Router($registry);
    $registry->set ('router', $router);

    $template = new Template($registry);
    $registry->set ('template', $template);

    $db = new PDO('mysql:host=localhost;dbname=autodb', 'root', 'root');
    $registry->set ('db', $db);

    $router->setPath (site_path . 'controllers');

    $router->delegate();




