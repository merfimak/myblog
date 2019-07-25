<?php

session_start();
require_once __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? $pathParts[1] : 'Article';
$act =  !empty($pathParts[2]) ? $pathParts[2] : 'Home';

$controllerClassName = '\App\controllers\\' .  $ctrl . 'Controller'; 

$controller = new $controllerClassName(new App\classes\View());
$method = 'action' . $act;
$controller->$method();



