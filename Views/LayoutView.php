<?php

namespace Slim\Extras\Views;

class LayoutView extends \Slim\View
{
	protected $layout;

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

	public function render($template)
	{
		if ($this->layout){
			$content =  parent::render($template);
			$this->setData(array('content_for_layout' => $content));
			return parent::render($this->layout);
		} else {
			return parent::render($template);
		}
	}
}
