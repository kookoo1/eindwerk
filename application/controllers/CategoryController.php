<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }
    public function overviewAction()
    {
        // action body
        $categoryModel = new Application_Model_Category();
        $category = $categoryModel->getAllCategory(); // haal alles op
//        $producten = $productenModel->fetchAll();
        var_dump($category);
        $this->view->category = $category;
        
        
    }


}

