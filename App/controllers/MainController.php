<?php
namespace App\controllers;



abstract class MainController
{

	public $view;
	public $ctrl;
	public $act;

	public function __construct($services, $ctrl, $act)
	{
		 $this->view = $services['View'];
		 $this->ctrl = $ctrl;
		 $this->act = $act;
		 
	}
	
	public function finelDispaly(){

		$cont = $this->view->render($this->ctrl .  '/' . $this->act . '.php');
		$this->view->cont = $cont;
		$cont = $this->view->display('layout.php');
	}
}