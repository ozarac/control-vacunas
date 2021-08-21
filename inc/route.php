<?php

function loadController($controller = DEFAULT_CONTROLLER){
    $controllerName = ucfirst($controller).'Controller';
    $controllerFile = 'Controllers/'.ucfirst($controller).'.php';

    if(!is_file($controllerFile)){
        $controllerName = ucfirst(DEFAULT_CONTROLLER).'Controller';
        $controllerFile = 'Controllers/'.DEFAULT_CONTROLLER.'.php';
    }

    require_once $controllerFile;
    $controller = new $controllerName();
    return $controller;
}

function loadAction($controller, $action = DEFAULT_ACTION){
    if (method_exists($controller,$action))
        $controller->$action();
    else{
        $action = DEFAULT_ACTION;
        $controller->$action();
    }
}