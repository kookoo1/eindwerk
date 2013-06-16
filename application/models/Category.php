<?php

class Application_Model_Category extends Application_Model_MyAbstractDB
{
    protected $_name    = "category";
    protected $_primary = "categoryID";

    public function getAllCategory()
    {   
        $select = $this->select();                          
        $result = $this->fetchAll($select);                
        return $result;
     }

}

