<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KrbForm
 *
 * @author krisbrassaert
 */
class KrbForm extends Zend_Form {

    //put your code here
    protected $t;

    public function init() {
        $this->$t = Zend_Registry::get("Zend_Translate");
    }

}

?>
