<?php

class Application_Model_Category extends Application_Model_MyAbstractDB {

    protected $_name = "category";
    protected $_primary = "categoryID";

    public function getAllCategory() {
        
        //$locale = Zend_Registry::get('Zend_Locale');
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->joinLeft(array('l' => 'categoryLocale'), 'category.categoryId = l.categoryId', 
                        array('category.categoryId AS categoryId', 'l.name AS name'))
                ->where('l.locale = ?', $this->getLocale());
        $result = $this->fetchAll($select);

       return $result;
    }
    
    public function selectCategory($params) {
        
       $result = $this->select($params);

       return $result;
    }

}

?>