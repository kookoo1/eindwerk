<?php

class ProductenController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function overviewAction() {

        $productenModel = new Application_Model_Producten();
//       $producten = $productenModel->getAllProducten($this->_getAllParams()); // haal alles op
        $producten = $productenModel->getProductsByCategory($this->getAllParams()); // haal alles op

        $this->view->producten = $producten;
    }

    public function detailAction() {
         $productenModel = new Application_Model_Producten();
//       $producten = $productenModel->getAllProducten($this->_getAllParams()); // haal alles op
        $producten = $productenModel->getProductDetail($this->getAllParams())->current(); // haal alles op

        $this->view->producten = $producten;
       // action body
    }

}

