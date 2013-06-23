<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
           $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $locale = Zend_Registry::get('Zend_Locale');
            $url = '/' . $locale . '/home';

            $redirector->gotoUrl($url);
    }

    public function aboutAction()
    {
        // action body
    }


}



