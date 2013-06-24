<?php

class Application_Model_Basket extends Application_Model_MyAbstractDB {

    // definiëren hoe de tabel eruit ziet 

    protected $_name = 'basket';
    protected $_primary = 'basketID';

    /**
     * here we get all the orders in the basket for this user
     * @param type $params
     * @return type
     */
    public function getBasketUser($params) {

        //var_dump($params);
        $username = $params['username'];
        $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                ->setIntegrityCheck(false)
                ->from(array('b' => 'basket'))
                ->join(array('bD' => 'basketDetail'), 'b.basketID = bD.basketID', null)
                ->join(array('u' => 'users'), 'u.usersID = b.usersID', null)
                ->where('u.username = ?', $username);

        $result = $this->fetchAll($select)->current();
        return $result;
    }

    public function addToBasketUser($params) {

        // first we check if there is alraedy a basket for this user
        $auth = Zend_Auth::getInstance();
        $identity = $auth->getIdentity();
        $paramUser = array('username' => $identity);
        $basketUser = $this->getBasketUser($paramUser);


        // if there is no basket for this indentity we have to make it
        if ($basketUser == null) {
            $usersModel = new Application_Model_Users();
            $user = $usersModel->getUserByIdentityRole($identity);
            //var_dump($user);
            $paramUserId = array('usersId' => $user['usersID']);
            $basketId = $this->insert($paramUserId);
        } else {
            $basketId = $basketUser['basketID'];
        }
        //$basketUser = $this->getBasketUser($paramUser);
        //var_dump($basketId); 
//        var_dump($params);
//        die('addToBasketUser');
        // here we have to add the products to the db for details
        $insert_data = array(
            'basketID' => $basketId,
            'productID' => $params['id'],
            'number' => $params['number']
        );

        $basketDetailModel = new Application_Model_BasketDetail();

        $result = $basketDetailModel->addToBasketDetail($insert_data);
        
        if ($result != null) {
            echo 'Product is toegevoegd';
        }
    }

}

