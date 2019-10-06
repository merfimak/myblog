<?php
namespace App\controllers;

use App\Models\Article;

class ArticleController extends MainController
{
	

	public function actionHome()
	{		
	
		$this->finelDispaly();
	}

	public function actionAll()
	{		
		$items = Article::getAll();	
		$this->view->items = $items;
		$this->finelDispaly();
	}

	public function actionOne()
	{
		$id = $_GET['id'];
		$item =  Article::getOne($id);	
		$this->view->item = $item;
		$this->finelDispaly();
	}
}