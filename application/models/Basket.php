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

        try {
            //var_dump($params);
            $username = $params['username'];
            $select = $this->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
                    ->setIntegrityCheck(false)
                    ->from(array('b' => 'basket'))
                    ->join(array('bD' => 'basketDetail'), 'b.basketID = bD.basketID', null)
                    ->join(array('u' => 'users'), 'u.usersID = b.usersID', null)
                    ->where('u.username = ?', $username);

            $result = $this->fetchAll($select)->current();
        } catch (Exception $ex) {
            $result = null;
        }
        return $result;
    }

    /**
     * here we add the order to the basket
     * @param type $params
     */
    public function addToBasketUser($params) {

        $basketUser = $this->getBasketUserFromAuth();

        // if there is no basket for this indentity we have to make it
        if ($basketUser == null) {
            $usersModel = new Application_Model_Users();
            $user = $usersModel->getUserByIdentityRole($this->getUserFromAuth());
            //var_dump($user);
            $paramUserId = array('usersId' => $user['usersID']);
            $basketId = $this->insert($paramUserId);
        } else {
            $basketId = $basketUser['basketID'];
        }
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

//==============================================================================
//------------------------------------------------------------------------------
    /**
     * here we get all the orders
     * @return type
     */
    public function getAllOrdersInBasket() {

        $basketUser = $this->getBasketUserFromAuth();

        $basketDetailModel = new Application_Model_BasketDetail();

        $result = $basketDetailModel->getAllOrdersInBasket($basketUser);

        return $result;
    }

// end 'public function getAllOrdersInBasket()
//==============================================================================
//------------------------------------------------------------------------------
    public function getNumOfOrdersInBasket() {

        $basketUser = $this->getBasketUserFromAuth();

        $result = 0;
        if ($basketUser != null) {
            $basketDetailModel = new Application_Model_BasketDetail();


            $result = $basketDetailModel->getNumOfOrdersInBasket($basketUser);
        }

        return $result;
    }

//==============================================================================
//------------------------------------------------------------------------------
    /**
     * here we get the user identity of the basketDB needed for the select
     * @return type
     */
    public function getBasketUserFromAuth() {

        $auth = Zend_Auth::getInstance();
        $identity = $auth->getIdentity();
        $paramUser = array('username' => $identity);
        $basketUser = $this->getBasketUser($paramUser);

        return $basketUser;
    }

// end'public function getBasketUserFromAuth()
//==============================================================================
//------------------------------------------------------------------------------
    /**
     * here we get the user identity needed for the select
     * @return type
     */
    public function getUserFromAuth() {

        $auth = Zend_Auth::getInstance();
        $identity = $auth->getIdentity();

        return $identity;
    }

// end'public function getBasketUserFromAuth()
//==============================================================================

    
//------------------------------------------------------------------------------
    /**
     * here we delete all the orders for this login
     */
    public function deleteAllOrdersInBasket() {
        
        //$delete = $this->delete($where);
    }
// end'public function getBasketUserFromAuth()
//==============================================================================

}

// end 'class Application_Model_Basket extends Application_Model_MyAbstractDB
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$

