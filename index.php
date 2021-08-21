<?php
    date_default_timezone_set('America/Guatemala');
    require_once 'config.php';
    require_once 'inc/Database.php';
    require_once 'inc/route.php';

    if(isset($_GET['c'])){
        $controller = loadController($_GET['c']);

        if(isset($_GET['a']))
            loadAction($controller,$_GET['a']);
        else
            loadAction($controller,DEFAULT_ACTION);
    }else{
        $controller = loadController(DEFAULT_CONTROLLER);
        loadAction($controller,DEFAULT_ACTION);
    }
