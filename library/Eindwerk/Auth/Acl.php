<?php

class Eindwerk_Auth_Acl extends Zend_Controller_Plugin_Abstract {

    //put your code here

    public function preDispatch(\Zend_Controller_Request_Abstract $request) {

        // op welke 
        $acl = new Zend_Acl();


        $roles = array('USER', 'ADMIN', 'GUEST'); // uitlzen normaal DB!!! case sensitive!!!
        // here we make a model for the roles!!
//        $model_roles = new Application_Model_Roles();
//        $roles = $model_roles->getRoles();


//        $controllers = array('users', 'index', 'producten', 'details', 
//            'logout', 'error', 'noaccess', 'admin:index');
        $controllers = array('users', 'index','producten','page','contact','home','error'
            ,'bestel');

//        $model_controllers = new Application_Model_Controllers();
//        $controllers = $model_controllers->getControllers();
//        var_dump($controllers);
//        die();

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        foreach ($controllers as $controller) {
//            $acl->addResource($controller);// kan ook
            //var_dump($controller);
            $acl->add(new Zend_Acl_Resource($controller));
        }

        //die();

        $acl->allow('ADMIN'); // acces to averything
        $acl->allow('USER'); // acces to averything
        $acl->allow('GUEST'); // acces to averything
        $acl->deny('GUEST','producten');
        
        
        //$acl->allow('USER','producten'); // acces to averything
//        $acl->deny('USER'); // acces to everything
//        $acl->allow('USER','page');// user no acces to admin 
        
        
//        $acl->allow('USER', 'Producten'); // user no acces to admin 
//        $acl->allow('USER', 'details'); // user no acces to admin 
//        $acl->allow('USER', 'index'); // user no acces to admin 
//        //$acl->allow('USER','Default-index');// user no acces to admin // dat werkt nog 
//        $acl->allow('USER', 'Users'); // user no acces to admin 
//        $acl->allow('USER', 'noaccess'); // user no acces to admin 
//       $acl->allow('GUEST', 'Users'); // user no acces to admin 

        Zend_Registry::set('Zend_Acl', $acl);
    }

}

?>
