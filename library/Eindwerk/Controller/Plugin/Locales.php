<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locales
 *
 * @author krisbrassaert
 */
class Eindwerk_Controller_Plugin_Locales extends Zend_Controller_Plugin_Abstract {

    //put your code here

    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        $localesModel = new Application_Model_Locales();
        $locales = $localesModel->getAllLocales();
 
        $container = new Zend_Navigation();
        $locale = Zend_Registry::get('Zend_Locale');
        foreach ($locales as $localen) {

            $menu = new Zend_Navigation_Page_Mvc(array(
                'label' => $localen['gui'],
                'route' => 'lang', // de route om mooiere URL te maken
                'params' => array('slug' => $localen['locale'],
                    'lang' => $localen['locale'])
            ));

           $container->addPage($menu);
        }


        Zend_Registry::set('localeMenu', $container);

        
        return $container;
    }

}

?>
