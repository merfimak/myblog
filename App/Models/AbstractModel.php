<?php
namespace App\Models;

use App\classes\Locator;
use App\Interfaces\IModel;
use Exception;

abstract class AbstractModel
	implements IModel
{

	static protected $table; 
	protected $data = [];
	protected $db = [];

	public static function getTable()
	{
		return static::$table;
	}

	public function __set($k, $v)
	{// такойже прием как и в классе view
		$this->data[$k] = $v;
	}

	public function __get($k)
	{
		return $this->data[$k];
	}

	static public function getAll()
	{
		$class = get_called_class();
		$db = Locator::getService('DB');
		$db->setClassName($class);
		return $res = $db->query('SELECT * FROM ' . static::$table);
	}

	static public function getOne($id)
	{
		$class = get_called_class();
		$db = Locator::getService('DB');
		$db->setClassName($class);

		try{
			$res = $db->query('SELECT * FROM ' . static::$table . ' WHERE id = :id',[':id' => $id])[0] ;
			if (!isset($res)){
				throw new Exception('такой статьи в базе нет');
			}
		}catch (Exception $e){

			$view = Locator::getService('View');
			$view->messege = $e->getMessage();
			$view->display('v_404.php');
				die(); 
			}
		return $res;
	}

	public function insert()
	{
	
		foreach($this->data as $key => $val){
			$a[] = $key;
			$b[] = ':' . $key;
			$data[':' . $key] = $val;
		} 
		
		 $sql = 'INSERT INTO ' . static::$table . '
		 (' . implode(', ', $a) . ') 
		 VALUES 
		 (' . implode(', ', $b) . ')
		 ';

		 $db = Locator::getService('DB');
		 $db->Execute($sql, $data);
		 return $this->id = $db->lastInsertId();
	}


	public function updata($id)
	{	
		foreach($this->data as $key => $val){
			$a[] = $key . '=:'.$key;
			$data[':' . $key] = $val;
		}
	 	$sql = 'UPDATE ' . static::$table . '
	 	 SET ' . implode(', ', $a) . '
	 	 WHERE id = '. $id; 

		$db = Locator::getService('DB');
		$db->Execute($sql, $data);
	}

	public function delete($id)
	{
	$sql ='DELETE FROM ' . static::$table . ' WHERE id='.$id;
	$db = Locator::getService('DB');
	$db->Execute($sql);
	}

}