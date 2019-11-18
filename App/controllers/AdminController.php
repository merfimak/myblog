<?php
namespace App\controllers;

use App\Models\Article;
use App\Models\User;

class AdminController extends MainController
{

	public $view;

	public function __construct($services, $ctrl, $act){

		parent::__construct($services, $ctrl, $act);
		 	$this->view = $services['View'];
		 	$this->validator = $services['Validator'];
		}


	public function actionLogin()
	{
		if(count($_POST) > 0){
			$login = $_POST['login'];
			$pass = $_POST['password'];
				if($this->check($login,$pass)){
					$_SESSION['accept'] = 'accept';
					header('Location: /admin');
								exit();
				}

		}
		
		$this->finelDispaly();

	}

	public function actionHome()
	{

		if(!$this->is_auth()){
			header('Location: /admin/login');
				exit();
		}
		$items = Article::getAll();
		$this->view->items = $items;
		$this->finelDispaly();
	}

	public function actionAdd()
	{

	if(!$this->is_auth()){
			header('Location: admin/login');
				exit();
		}

		$msg = '';

		if(count($_POST) > 0){
		$title = $_POST['title'];
		$text = $_POST['text'];
			

		if($this->validator->validate($title,$text)){
			$article = new Article;
			$article->title = $title;
			$article->text = $text;
			$res = $article->insert();
			$msg = 'статья отправлена';
		}

	}
	
		$this->view->msg = $msg;
		$this->finelDispaly();

	}

	public function actionEdit()
	{

		if(!$this->is_auth()){
			header('Location: /admin/login');
				exit();
		}

		$id = $_GET['id'];
		$msg = '';
	
		if(count($_POST) > 0){
			$title = $_POST['title'];
			$text = $_POST['text'];
				

			if($this->validator->validate($title,$text)){

				$article = new Article;
				$article->title = $title;
				$article->text = $text;
				$res = $article->updata($id);
				$msg = 'статья исправлена';
		}else{
			$msg = 'заполните все поля';
		}

	}
		
		$article =  Article::getOne($id);			
		$this->view->msg = $msg;
		$this->view->article = $article;
		$this->act = 'add';// так как форма одна и для добавления и для редакции и называеться шаблон add.php
		$this->finelDispaly();

	}

	public function actionDestroy()
	{
		$id = $_GET['id'];
		$article = new Article;
		$article->delete($id);
		header('Location: /admin/home');
		exit;
	}

	protected function is_auth()
	{
		$is_auth = false;
		if(isset($_SESSION['accept']) && $_SESSION['accept']) 
			$is_auth = true;
	
		return $is_auth;
	}

	protected function check($login,$pass)// проверяем аутентфикацию
	{
		$user = new User;
		$res = $user->checkout($login,$pass);
		if(!$res){
			return false;
		}
		return true;
	}

}