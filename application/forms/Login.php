<?php

class Application_Form_Login extends Zend_Form {

    
    public function init() {


        $t = Zend_Registry::get("Zend_Translate");
        //$locale = Zend_Registry::get('Zend_Locale');
        //$url = '/'.$locale.'/login';

        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');

        $this->addElement(new Zend_Form_Element_Text('login', array(
//           'label'      => $this->translate('login-name'),
            'label' => $t->translate('login.login'),
            'filters' => array('stringTrim'),
            'required' => true
        )));
        $this->addElement(new Zend_Form_Element_Password('passwd', array(
            'label' => $t->translate('login.passwd'),
            'filters' => array('stringTrim'),
            'required' => true
        )));

        $this->addElement(new Zend_Form_Element_Button('submit', array(
            'type' => 'submit',
            'value' => 'submit_lbl',
            'label' => $t->translate('login.submit'),
            'required' => false,
            'ignore' => true
        )));
    }

}
?>

