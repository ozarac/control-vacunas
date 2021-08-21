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

function loadAction($controller, $action = DEFAULT_ACTION, $id = NULL){
    if (method_exists($controller,$action))
        if($id == NULL)
            $controller->$action();
        else
            $controller->$action($id);
    else{
        $action = DEFAULT_ACTION;
        $controller->$action();
    }
}