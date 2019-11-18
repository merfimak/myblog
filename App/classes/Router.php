<?php

namespace App\classes;

class Router
{
	public function go($path, $services){
		$route = explode('/', $path);


	$ctrl = !empty($route[1]) ? $route[1] : 'article';
	$act =  !empty($route[2]) ? $route[2] : 'home';

	//echo $controllerClassName = '\App\controllers\\' .  ucfirst($ctrl) . 'Controller'; 
	$controllerClassName = '\App\controllers\\' .  ucfirst($ctrl) . 'Controller'; // ucfirst($ctrl) так как контроллеры написаны с большой буквы и на линуксовом сервере не работают

	if(class_exists($controllerClassName)){
		$controller = new $controllerClassName($services, $ctrl, $act);
		
	}else{
		header('Location: /');
		//echo "Контроллер $controllerClassName ненайден";
		die;
	}
	$method = 'action' . ucfirst($act);// ucfirst($act) так как контроллеры написаны с большой буквы и на линуксовом сервере не работают
	if(method_exists($controller, $method)){
	$controller->$method();
	}else{
		header('Location: /');
	//echo "action $method ненайден";
		die;
	}
		}
}


