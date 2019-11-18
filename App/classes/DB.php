<?php
namespace App\classes;

use PDO;

class DB
{

	private $dbh;
	private $className = 'stdClass';

	public function __construct()
	{

		try {
			$this->dbh = new PDO('mysql:dbname=myblog;host=localhost', 'root', '');//для локального сервера
			//$this->dbh = new PDO("mysql:dbname=cyberjes_myblog;host=localhost", "cyberjes_admin", "Kw2BhqKhB6svjve"); для cyber1jesus.tk
		}catch (\PDOException $e) {
			$text = 'неудалось подключиться к БД' . $e->getMessage();
			echo $text;
			die();
		}
	}

	public function setClassName($className){
		$this->className = $className;
	}


	public function query($sql, $params=[])
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);
		return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	}

	public function execute($sql, $params=[]){
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
	}

	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}

}