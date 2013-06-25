<?php

class Application_Model_Users extends Zend_Db_Table_Abstract {

    protected $_name = "users";
    protected $_primary = "usersID";

    /**
     * 
     * @param Zend_Auth $indentity
     * @return Zend_Db_Table_Rowset
     */
    public function getUserByIdentity($indentity) {

        $select = $this->select()->where('username = ?', $indentity);
        $result = $this->fetchAll($select)->current();

       return $result;
    }

    public function getUserByIdentityRole($indentity) {

        $select = $this->select()
                ->setIntegrityCheck(false)
                ->from(array('u' => 'users'))
                ->join(array('ur' => 'usersRoles'), 'ur.usersID = u.usersID', array())
                ->join(array('r' => 'roles'), 'ur.rolesID = r.rolesID', array('*'))
                ->where('username = ?', $indentity);

//      var_dump($select);
//      die();
        $result = $this->fetchAll($select)->current();
//        echo 'role ==> '.$result['role'];
//        var_dump($result);
//        die();
        return $result;
    }
    
    
    public function addUser($params) {
        
        $this->insert($params);
    }

    
    
    function checkUnique($username)
    {
        $select = $this->_db->select()
                            ->from($this->_name,array('username'))
                            ->where('username=?',$username);
        $result = $this->getAdapter()->fetchOne($select);
        if($result){
            return true;
        }
        return false;
    }
    
}

