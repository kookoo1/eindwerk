<?php

class BasketController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function orderAction()
    {
        
      $basketForm = new Application_Form_Basket();

        $this->view->form = $basketForm;
        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost(); // $_POST
            if ($this->view->form->isValid($postParams)) {
                $paramsForm = $this->view->form->getValues();

               $allData = array_merge($this->getAllParams(),$paramsForm);
               $basketModel = new Application_Model_Basket();
               $basket = $basketModel->addToBasketUser($allData); // haal alles op
                //$this->view->producten = $producten;
            }
        }
    }

    public function orderlistAction()
    {
         $basketModel = new Application_Model_Basket();
//       $producten = $productenModel->getAllProducten($this->_getAllParams()); // haal alles op
        $orderInBasket = $basketModel->getAllOrdersInBasket(); // haal alles op

        $this->view->basket = $orderInBasket;
    }

    public function orderdeleteAction()
    {
        $basketModel = new Application_Model_Basket();
//       $producten = $productenModel->getAllProducten($this->_getAllParams()); // haal alles op
        $deleteOrderInBasket = $basketModel->deleteAllOrdersInBasket(); // haal alles op

        $this->view->basket = $deleteOrderInBasket;

    }


}





