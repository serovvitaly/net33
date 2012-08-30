<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Rules extends Controller_Admin {
    
    public function action_index()
    {
        $view = View::factory('templates/admin/rules/index');
        
        $view->items = ORM::factory('rules')->find_all()->as_array();
        
        $this->template->content = $view;
    }
    
    public function action_add()
    {
        $view = View::factory('templates/admin/rules/add');
        
        $this->template->content = $view;
    }
    
    public function action_edit()
    {
        $id = $this->request->param('id');
        
        if ($id < 1) {
            //
        }
        
        $view = View::factory('templates/admin/rules/edit');
        
        $this->template->content = $view;
    }
    
    public function action_delete()
    {
        $id = $this->request->param('id');
        
        if ($id > 0) {
            
            ORM::factory('rules', $id)->delete();
            
            $this->request->redirect('/admin/rules/');
            
        }
        
        $this->template->content = 'Элемент для удаления не определен.';
    }

} // End
