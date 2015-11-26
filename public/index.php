

<?php
    include "../application/includes/startup.php";
    include '../application/classes/router.php';


    $router = new Router($registry);

    $template = new Template($registry);

    $registry->set ('template', $template);

    $registry->set ('router', $router);

    $router->setPath (site_path . 'controllers');

    $router->delegate();




