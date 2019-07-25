<?php

namespace App\Interfaces;

interface ViewInterface
{
	public function render($template);
	public function display($template);
}