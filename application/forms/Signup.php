<?php

class Application_Form_Signup extends Zend_Form {

    public function init() {


        $t = Zend_Registry::get("Zend_Translate");
        //$locale = Zend_Registry::get('Zend_Locale');
        //$url = '/'.$locale.'/login';

        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');

        $this->addElement(new Zend_Form_Element_Text('username', array(
//           'label'      => $this->translate('login-name'),
            'label' => $t->translate('signup.username'),
            'filters' => array('stringTrim'),
            'required' => true
        )));
        $this->addElement(new Zend_Form_Element_Text('nickname', array(
//           'label'      => $this->translate('login-name'),
            'label' => $t->translate('signup.nickname'),
            'filters' => array('stringTrim'),
            'required' => true
        )));
        $this->addElement(new Zend_Form_Element_Text('adress', array(
//           'label'      => $this->translate('login-name'),
            'label' => $t->translate('signup.adress'),
            'filters' => array('stringTrim'),
            'required' => true,
            'validators' => array(
                array('StringLength', true, array('max' => 255))
            )
        )));
        $this->addElement(new Zend_Form_Element_Text('email', array(
//           'label'      => $this->translate('login-name'),
            'label' => $t->translate('signup.email'),
            'filters' => array('stringTrim'),
            'required' => true,
            'validators' => array(
                array('StringLength', true, array('max' => 100)),
                array('EmailAddress'))
        )));

        $this->addElement(new Zend_Form_Element_Password('passwd', array(
            'label' => $t->translate('signup.passwd'),
            'filters' => array('stringTrim'),
            'required' => true
        )));
        $this->addElement(new Zend_Form_Element_Password('confirmPasswd', array(
            'label' => $t->translate('signup.confirmPasswd'),
            'filters' => array('stringTrim'),
            'required' => true,
            'required' => true
        )));

        $this->addElement(new Zend_Form_Element_Button('submit', array(
            'type' => 'submit',
            'value' => 'signup',
            'label' => $t->translate('signup.submit'),
            'required' => false,
            'ignore' => true
        )));
    }

}

?>
