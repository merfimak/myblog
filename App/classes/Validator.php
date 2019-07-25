<?php

namespace App\classes;

class Validator
{

	static public function validate($title,$text)
	{

		if(!empty($title) && !empty($text)){
			return true;
		}
		return false;
	}



}