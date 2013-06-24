<?php

class Application_Model_BasketDetail extends Application_Model_MyAbstractDB {

    // definiëren hoe de tabel eruit ziet 

    protected $_name = 'basketDetail';
    protected $_primary = 'basketDetailID';

    public function addToBasketDetail($params) {


        $result = $this->insert($params);
        return $result;
    }

    public function getAllOrdersInBasket($params) {

        $result = null;
        try {
            $basketID = $params['basketID'];
            $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                    ->setIntegrityCheck(false)
                    //->from(array('bD' => 'basketDetail'))
                    //->joinInner(array('pl' => 'productLocale'), 'pl.productID = bD.productID', array('*'))
                    ->where('basketID = ?', $basketID);
            
            
           $result = $this->fetchAll($select);
        } catch (Exception $ex) {
            
        }
        return $result;
    }

    public function getNumOfOrdersInBasket($params) {

        $result = $this->getAllOrdersInBasket($params)->count();
        return $result;
    }

}

