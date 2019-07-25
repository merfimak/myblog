<?php
namespace App\Models;

use App\classes\DB;

class User extends AbstractModel
{
	
	public static $table = 'users';
	protected static $class = 'User';

	public function checkout($login,$pass)
	{
		$data[':login'] = $login;
		$data[':pass'] = $pass;
		$sql = 'SELECT * FROM '. static::$table . ' WHERE login = :login AND pass = :pass';
		$class = get_called_class();
		$db = new DB;
		$res = $db->query($sql, $data);
		if(!$res){
			return false;
		}
		return true;
	}


}
