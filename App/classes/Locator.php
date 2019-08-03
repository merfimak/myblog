<?php

namespace App\classes;

use Exception;

class Locator
{

	public static $services = array();
    private static $serviceLocatorInstance = null;
    private function __construct(){} 
  
    public static function getInstance()
    {
       if(is_null(self::$serviceLocatorInstance)){
          self::$serviceLocatorInstance = new Locator();
       }
      
       return self::$serviceLocatorInstance;        
    }
  
    public function loadService($name, $service)
    {
       self::$services[$name] = $service;   
    }
  
    public function getService($name) 
    {
       if(!isset(self::$services[$name])){
       echo 'бяда';
       }
       
       return self::$services[$name];
    }

}


