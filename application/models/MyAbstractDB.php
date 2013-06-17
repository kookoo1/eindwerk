<?php

class Application_Model_MyAbstractDB extends Zend_Db_Table_Abstract {

    protected $_name    = "";
    protected $_primary = "";

    const MENU_VISIBLE      = 1;
    const MENU_INVISIBLE    = 0;
    const STATUS_ONLINE     = 1;
    const STATUS_OFFLINE    = 0;

    

}

