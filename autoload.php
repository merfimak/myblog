<?php


function autoloadFunc($calss) 
{
	$classParts = explode('\\', $calss);
	$Path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
	if(file_exists($Path)){
		require $Path;
		}	
}

spl_autoload_register("autoloadFunc");
