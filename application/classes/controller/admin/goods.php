<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Goods extends Controller_Admin {
    
    public function action_index()
    {
        $view = View::factory('templates/admin/goods/index');
        
        $this->template->content = $view;
    }
    
    public function action_add()
    {
        $view = View::factory('templates/admin/goods/add');
        
        $this->template->content = $view;
    }

} // End
