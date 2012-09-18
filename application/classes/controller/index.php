<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template {

    public $template = 'layouts/frontend';
    
	public function action_index()
	{
        $view = View::factory('templates/frontend/index');
        
		$this->template->content = $view;
	}

} // End
