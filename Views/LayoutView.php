<?php

namespace Slim\Extras\Views;

class LayoutView extends \Slim\View
{
	protected $layout;

	public function setLayout($layout)
	{
		$this->layout = $layout;
	}

        public function render($template, $data=array())
        {
                if ($this->layout){
                        if(!empty($data) && is_array($data)){
                                $data = array_merge($this->all(), $data);
                        }

                        $content =  parent::render($template, $data);
                        $this->appendData(array('content_for_layout' => $content));
                        return parent::render($this->layout, $data);
                } else {
                        return parent::render($template, $data);
                }
        }
}
