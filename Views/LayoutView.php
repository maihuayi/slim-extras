<?php

namespace Slim\Extras\Views;

class LayoutView extends \Slim\View
{
	protected $layout;

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function render($template, $data=null)
	{
		if ($this->layout){
			$content =  parent::render($template, $data);
			$this->setData(array('content_for_layout' => $content));
			return parent::render($this->layout, $data);
		} else {
			return parent::render($template, $data);
		}
	}
}
