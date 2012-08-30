<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Goods extends Controller_Admin {
    
    public function action_index()
    {
        $view = View::factory('templates/admin/goods/index');
        
        $view->items = ORM::factory('goods')->find_all()->as_array();
        
        $view->rules = ORM::factory('rules')->find_all()->as_array();
        
        $this->template->content = $view;
    }
    
    
    /**
    * Выводит форму добавления товара
    * 
    */
    public function action_add()
    {
        $view = View::factory('templates/admin/goods/add');
        
        $view->rules = ORM::factory('rules')->find_all()->as_array();
        
        $this->template->content = $view;
    }
    
    
    public function action_edit()
    {
        $id = $this->request->param('id');
        
        if ($id < 1) {
            //
        }
        
        $view = View::factory('templates/admin/goods/edit');
        
        $view->rules = ORM::factory('rules')->find_all()->as_array();
        
        $view->item = ORM::factory('goods', $id);
        
        $this->template->content = $view;
    }
    
    
    public function action_delete()
    {
        $id = $this->request->param('id');
        
        if ($id > 0) {
            
            ORM::factory('goods', $id)->delete();
            
            $this->request->redirect('/admin/goods/');
            
        }
        
        $this->template->content = 'Элемент для удаления не определен.';
    }
    
    
    /**
    * Сохраняет данные
    * 
    */
    public function action_save()
    {
        $controller = $this->request->controller();
        
        $data = isset($_POST[$controller]) ? $_POST[$controller] : array();
        
        if (count($data) > 0) {
            
            $id = isset($data['id']) ? $data['id'] : NULL;
            
            $model = ORM::factory($controller, $id);
            
            $columns = $model->list_columns();
            
            foreach ($data AS $item_name => $item_value) {
                if (in_array($item_name, array_keys($columns)) AND $item_name != 'id') {
                    $model->set($item_name, $item_value);
                }
                
            }
            
            $model->save();
            
            $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : '/admin/' . $controller;
            
            $this->request->redirect($redirect_url);            
        }
        
        $this->template->content = 'Нет данных для записи';
    }
    

} // End
