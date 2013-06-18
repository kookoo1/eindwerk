<?php

class Eindwerk_Controller_Plugin_NavigationCatg extends Zend_Controller_Plugin_Abstract {

    /**
     * 
     * @param \Zend_Controller_Request_Abstract $request
     * @return \Zend_Navigation
     */
    public function preDispatch(\Zend_Controller_Request_Abstract $request) {


        $locale = Zend_Registry::get('Zend_Locale');
        $model = new Application_Model_Category();
        $pages = $model->getAllCategory();

//        var_dump($pages);
//        die;
        $container = new Zend_Navigation();

        foreach ($pages as $page) {

            $menu = new Zend_Navigation_Page_Mvc(array(
                'label' => $page['name'],
                'route' => 'category', // de route om mooiere URL te maken
                'params' => array('slug' => $page['label'],
                    'lang' => $locale)));

//            var_dump($menu);
            $container->addPage($menu);
        }

//        Zend_Registry::set('Zend_Navigation', $container);
        Zend_Registry::set('catgMenu', $container);

        return $container;
    }

}

?>
