<?php defined('SYSPATH') or die('No direct script access.');

class Model_Goods extends ORM {

    protected $_table_name = 'goods';
    
    protected $_prices_list = array();
    
    protected $_has_many = array(
        'prices' => array(
            'model' => 'price',
            'foreign_key' => 'good_id'
        )
    );
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
        
        $_prices_list = $this->prices->find_all()->as_array();
        
        if (count($_prices_list) > 0) {
            foreach ($_prices_list AS $_price) {
                $this->_prices_list[$_price->rule_id] = $_price->price;
            }
        }
        
    }
    
    /**
    * Возвращает цену для заданной ценовой категории
    * 
    * @param mixed $rule_id
    */
    public function get_price($rule_id)
    {
        if (isset($this->_prices_list[$rule_id])) {
            return $this->_prices_list[$rule_id];
        }
        
        return NULL;
    }

} // End