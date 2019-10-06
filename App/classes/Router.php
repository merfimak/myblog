<?php

namespace App\classes;

class Router
{
	public function go($path, $services){
		$route = explode('/', $path);


	$ctrl = !empty($route[1]) ? $route[1] : 'Article';
	$act =  !empty($route[2]) ? $route[2] : 'Home';

	$controllerClassName = '\App\controllers\\' .  $ctrl . 'Controller'; 

	if(class_exists($controllerClassName)){
		$controller = new $controllerClassName($services, $ctrl, $act);
		
	}else{
		echo "Контроллер $controllerClassName ненайден";
		die;
	}
	$method = 'action' . $act;
	if(method_exists($controller, $method)){
	$controller->$method();
	}else{
	echo "action $method ненайден";
	}
		}
}


