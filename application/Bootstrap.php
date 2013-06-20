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
        //$front->registerPlugin(new Eindwerk_Auth_Acl());
        //$front->registerPlugin(new Eindwerk_Auth_Auth());
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
            'controller' => 'Home',
            'action' => 'index'
        )));

        
        
        
         $router->addRoute('contact', new Zend_Controller_Router_Route(':lang/contact/:slug', array(
            'controller' => 'contact',
            'action' => 'show'
        )));
         
         $router->addRoute('login', new Zend_Controller_Router_Route('login', array(
            'controller' => 'index',
            'action' => 'index'
        )));
         
        
        $router->addRoute('home', new Zend_Controller_Router_Route(':lang/home', array(
            'controller' => 'home',
            'action' => 'index'
        )));
        $router->addRoute('about', new Zend_Controller_Router_Route(':lang/about', array(
            'controller' => 'index',
            'action' => 'index'
        )));

        $router->addRoute('contact', new Zend_Controller_Router_Route(':lang/contact', array(
            'controller' => 'contact',
            'action' => 'show'
        )));
        
        $router->addRoute('category', new Zend_Controller_Router_Route(':lang/category/:slug', array(
            'controller' => 'category',
            'action' => 'overview'
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

