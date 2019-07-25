<?php

namespace App\Interfaces;

interface IModel
{
	public static function getAll();
	public static function getOne($id);
}