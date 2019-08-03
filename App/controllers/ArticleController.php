<?php
namespace App\controllers;

use App\Models\Article;

class ArticleController
{
	public function __construct($services)
	{
		 $this->view = $services['View'];
	}

	public function actionHome()
	{			
		$cont = $this->view->render('v_home.php');
		$this->view->cont = $cont;
		$cont = $this->view->display('v_base.php');
	}

	public function actionAll()
	{		
		$items = Article::getAll();	
		$this->view->items = $items;
		$cont = $this->view->render('v_all_articles.php');
		$this->view->cont = $cont;
		$cont = $this->view->display('v_base.php');
	}

	public function actionOne()
	{
		$id = $_GET['id'];
		$item =  Article::getOne($id);	
		$this->view->item = $item;
		$cont = $this->view->render('v_one.php');
		$this->view->cont = $cont;
		$cont = $this->view->display('v_base.php');
	}
}