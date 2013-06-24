<?php

class Application_Model_BasketDetail extends Application_Model_MyAbstractDB {

    // definiëren hoe de tabel eruit ziet 

    protected $_name = 'basketDetail';
    protected $_primary = 'basketDetailID';

    
    
    public function addToBasketDetail($params) {
     
        
        $result= $this->insert($params);
        return $result;
    }

}

