<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OverviewBasket
 *
 * @author krisbrassaert
 */
class Eindwerk_View_Helper_OverviewBasket extends Zend_View_Helper_Abstract {

    public function overviewBasket() {
        return $this;
    }

    public function smallView() {


        $basketmodel = new Application_Model_Basket();
        $nameUser = $basketmodel->getUserFromAuth();
        $num = $basketmodel->getNumOfOrdersInBasket();

//        var_dump($nameUser);
//        die();
//        $html = "<img src='/images/main/basket.png'  
//                    height = '50px' alt='basket'>
//                    <span>(" . $num . ")</span>";


        $html = "<img src='/images/main/basket.png'  
                    height = '50px' alt='basket'>
                    <h4> (" . $num . ")</h4>" .
                "<h3> " . $nameUser . " </h3>";

        return $html;
    }

    public function gridView() {

        $html = "<h1>full over viwe</h1>";
        return $html;
    }

}

?>
