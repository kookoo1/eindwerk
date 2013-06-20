<?php

class Eindwerk_Controller_Plugin_Navigation extends Zend_Controller_Plugin_Abstract {

    /**
     * 
     * @param \Zend_Controller_Request_Abstract $request
     * @return \Zend_Navigation
     */
    public function preDispatch(\Zend_Controller_Request_Abstract $request) {


        $locale = Zend_Registry::get('Zend_Locale');
        $model = new Application_Model_Page();
        $pages = $model->getMenu($locale);

//        var_dump($pages);
//        die;
        $container = new Zend_Navigation();

        foreach ($pages as $page) {

            $menu = new Zend_Navigation_Page_Mvc(array(
                'label' => $page['title'],
//                'route' => 'page', // de route om mooiere URL te maken
                'route' => $page['slug'], // de route om mooiere URL te maken
                'params' => array('slug' => $page['slug'],
                'lang' => $locale)));

//            var_dump($menu);
            $container->addPage($menu);
        }

//        Zend_Registry::set('Zend_Navigation', $container);
        Zend_Registry::set('mainMenu', $container);

        
        
        return $container;
    }

}

