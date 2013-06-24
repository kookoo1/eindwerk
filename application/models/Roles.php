<?php

class Application_Model_Roles extends Zend_Db_Table_Abstract
{
    protected $_name = 'roles';
    protected $_primary = 'id';
    

    
    /**
     * 
     * @param type 
     * @return type
     */
    
    public function getRoles()
    {
        $select = $this->select();                          
        $result = $this->fetchAll($select);                
        return $result;
    }


}

