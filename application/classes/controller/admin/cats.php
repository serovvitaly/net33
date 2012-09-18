<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Cats extends Controller_Admin {

    public function action_index()
    {
        $view = View::factory('templates/admin/cats/index');
        
        $view->items = ORM::factory('cats')->find_all()->as_array();
        
        $this->template->content = $view;
    }


} // End