<?php

class Application_Model_Locales extends Application_Model_MyAbstractDB {

    protected $_name = "locales";
    protected $_primary = "localesID";

    public function getAllLocales() {
        
       $result = $this->fetchAll();
//       var_dump($result);
//       die();
       return $result;
    }
    

}

