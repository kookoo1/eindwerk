<?php

class BasketController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function orderAction() {
        
        
//        $paramsAll = $this->getAllParams();
//        // action body
//        var_dump($paramsAll);
//        die('all params order');
//        
//                $productID = $params['id'];
//                var_dump($productID);
//                die('orderaction');
        //               
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

    public function orderListAction() {
        // action body
    }

}

