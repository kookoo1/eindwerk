<?php

class Application_Model_Producten extends Application_Model_MyAbstractDB {

    // definiëren hoe de tabel eruit ziet 

    protected $_name = 'product';
    protected $_primary = 'productID';

    public function getAllProducten($params) {
       $result = $this->fetchAll();

       return $result; // select * from nieuws
    }

    public function selectProducten($params) {
        // $params = array('titel' => 'lipsum', 'omschrijving' => 'bla bla');
        $this->select($params);
    }

    public function getProductsByCategory($params) {


//        echo 'tablename : '.$this->getLocale();
//        die();

        $categoryLabel = $params['slug'];
//        $select = $this->select()
//                ->setIntegrityCheck(false)
//                ->from(array('p' => 'product'))
//                ->join(array('pl' => 'productLocale'), 'p.productID = pl.productID',array())
//                ->join(array('pc' => 'productCategory'), 'pc.productID = p.productID',null)
//                ->join(array('c' => 'category'), 'c.categoryID = pc.categoryID', null)
//                ->where('c.label = ?', $categoryLabel)
//                ->where('pl.locale = ?', $this->getLocale());
        $select = $this->select()
                ->setIntegrityCheck(false)
                ->from(array('pl' => 'productLocale'))
                ->join(array('p' => 'product'), 'pl.productID = p.productID', array('*'))
                ->join(array('pc' => 'productCategory'), 'pc.productID = p.productID', null)
                ->join(array('c' => 'category'), 'c.categoryID = pc.categoryID', null)
                ->where('c.label = ?', $categoryLabel)
                ->where('pl.locale = ?', $this->getLocale());


        $result = $this->fetchAll($select);
        return $result;
    }

    public function getProductDetail($params) {


//        var_dump($params);
////
//        die();

        $productID = $params['id'];
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->from(array('pl' => 'productLocale'))
                ->join(array('p' => 'product'), 'pl.productID = p.productID', null)
                ->where('p.productID = ?', $productID)
                ->where('pl.locale = ?', $this->getLocale());
                


//        echo $select;
//        die();

        $result = $this->fetchAll($select);
        return $result;
    }

}

