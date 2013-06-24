<?php

class Application_Form_Basket extends Zend_Form {

    public function init() {


        $t = Zend_Registry::get("Zend_Translate");

        $this->addElement(new Zend_Form_Element_Text('number', array(
            'label' => $t->translate('basket.number'),
            'required' => true,
            //Filter de invoer
            'filters' => array('StringTrim') //Spaties wegfilteren voor/na invoer.
        )));


        //Versturen
        $this->addElement(new Zend_Form_Element_Button('add', array(
            'type' => 'submit',
            'label' => $t->translate('basket.add'),
            'required' => false,
            'ignore' => true
        )));

//        $this->addElement('submit', 'go', array(
//            'label' => 'Sign up',
//        ));
    }

}

