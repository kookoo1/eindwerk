<?php

class Application_Model_UsersRoles extends Zend_Db_Table_Abstract
{

    protected $_name = 'usersRoles';
    protected $_primary = 'usersRolesID';
    

    
    /**
     * 
     * @param type 
     * @return type
     */
    
    public function getAllUsersRoles()
    {
        $select = $this->select();                          
        $result = $this->fetchAll($select);                
        return $result;
    }
    
    
    
    public function addNewUser($params) {
        
        $this->insert($params);
        
    }
}

