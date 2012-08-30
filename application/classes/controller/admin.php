<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Template {
    
    public $template = 'layouts/admin';
    
    protected $top_menu = array(
        'index' => 'Главная',
        'goods' => 'Управление товарами',
        'users' => 'Поьзователи и группы',
    );
    
    public function before()
    {
        parent::before();
        
        $this->template->action = $this->request->controller();
        
        $this->template->top_menu = $this->top_menu;
    }
    
    public function action_index()
    {
        $this->template->content = 'ADMIN CONT';
    }
    
    public function action_save()
    {
        $controller = $this->request->controller();
        
        $data = isset($_POST[$controller]) ? $_POST[$controller] : array();
        
        if (count($data) > 0) {
            
            $model = ORM::factory($controller);
            
            foreach ($data AS $item_name => $item_value) {
                $model->set($item_name, $item_value);
            }
            
            $model->save();
            
            $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : '/admin/' . $controller;
            
            $this->request->redirect($redirect_url);            
        }
        
        $this->template->content = 'Нет данных для записи';
    }

} // End
