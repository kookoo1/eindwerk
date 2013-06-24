<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    
    
    
    public function _initNavigation() {
        // registreer de Navigation plugin
        $this->bootstrap('frontController');
        $front = $this->getResource('frontController');

        $front->registerPlugin(new Eindwerk_Controller_Plugin_Translate()); // => library/Syntra/Controller/Plugin/Translate.php
        $front->registerPlugin(new Eindwerk_Controller_Plugin_Navigation());
        $front->registerPlugin(new Eindwerk_Controller_Plugin_NavigationCatg());
        $front->registerPlugin(new Eindwerk_Controller_Plugin_Locales());
        $front->registerPlugin(new Eindwerk_Auth_Acl());
        $front->registerPlugin(new Eindwerk_Auth_Auth());
    }

    public function _initDbAdapter() {
        $this->bootstrap('db');
        $db = $this->getResource('db');
        Zend_Registry::set('db', $db);
        // ophalen dmv Zend_Registry::get('db');
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
    }
  /**
     * put after _initView
     * Creates all custom routes
     * @param array $options
     * @return Zend_Controller_Router_Route
     */
    public function _initRouter(array $options = null) {
        
        $router = $this->getResource('frontcontroller')->getRouter();

        // add custom route
        // ':' before param = $_GET
        $router->addRoute('lang', new Zend_Controller_Router_Route(':lang', array(
            'controller' => 'home',
            'action' => 'index'
        )));

                
         $router->addRoute('login', new Zend_Controller_Router_Route(':lang/login', array(
            'controller' => 'users',
            'action' => 'login'
        )));
         $router->addRoute('logout', new Zend_Controller_Router_Route(':lang/logout', array(
            'controller' => 'users',
            'action' => 'logout'
        )));
         
        
        $router->addRoute('home', new Zend_Controller_Router_Route(':lang/home', array(
            'controller' => 'home',
            'action' => 'index'
        )));
        $router->addRoute('about', new Zend_Controller_Router_Route(':lang/about', array(
            'controller' => 'index',
            'action' => 'about'
        )));

        $router->addRoute('contact', new Zend_Controller_Router_Route(':lang/contact', array(
            'controller' => 'contact',
            'action' => 'show'
        )));
        
//        $router->addRoute('category', new Zend_Controller_Router_Route(':lang/category/:slug', array(
//            'controller' => 'category',
//            'action' => 'overview'
//        )));
        $router->addRoute('product', new Zend_Controller_Router_Route(':lang/product/:slug', array(
            'controller' => 'producten',
            'action' => 'overview'
        )));
        $router->addRoute('productDetail', new Zend_Controller_Router_Route(':lang/product/detail/id/:id', array(
            'controller' => 'producten',
            'action' => 'detail'
        )));
        $router->addRoute('basketDetail', new Zend_Controller_Router_Route(':lang/product/detail/id/order/:id', array(
            'controller' => 'basket',
            'action' => 'order'
        )));
   

   
         

//        $router->addRoute('admin', new Zend_Controller_Router_Route('admin/:controller/:action', array(
//            'module' => 'admin',
//            'controller' => 'index',
//            'action' => 'index'
//        )));
         
//        $router->addRoute('login', new Zend_Controller_Router_Route(':lang/login', array(
//            'controller' => 'Users',
//            'action' => 'login'
//        )));
//
//        $router->addRoute('logout', new Zend_Controller_Router_Route(':lang/logout', array(
//            'controller' => 'Users',
//            'action' => 'logout'
//        )));
        // the Krb_Shop routes

    }
}

