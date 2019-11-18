<?php
namespace App\classes;

use App\Interfaces\ViewInterface;

class View implements ViewInterface
{

	protected $data;

	public function __set($k, $v)
	{
		$this->data[$k] = $v;
	}

	public function render($template)
	{
		//echo $template;
		if(!empty( $this->data)) {
			foreach ($this->data as $key => $value) {
				$$key = $value;
			}
		}
		ob_start();	
		include __DIR__ .'/../../view/'. $template;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	public function display($template)
	{
		echo $this->render($template);
	}

}