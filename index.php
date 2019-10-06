<?php

session_start();
//require_once __DIR__ . '/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$services = include 'App/config/servises.php';
foreach ($services as $key => $value) {
	\App\classes\Locator::getInstance()->loadService($key, new $value);
}

$services = \App\classes\Locator::$services;//массив с инициализироваными обьектами


$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$router = new App\classes\Router;

$router->go($path, $services);
