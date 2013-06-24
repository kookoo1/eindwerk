<?php

class Eindwerk_Auth_Acl extends Zend_Controller_Plugin_Abstract {

    //put your code here

    public function preDispatch(\Zend_Controller_Request_Abstract $request) {

        // op welke 
        $acl = new Zend_Acl();


        $roles = array('USER', 'ADMIN', 'GUEST'); // uitlzen normaal DB!!! case sensitive!!!
        // here we make a model for the roles!!
//        $modelRoles = new Application_Model_Roles();
//        //die('hdfh');
//        $roles = $modelRoles->getRoles()->toArray();
//        
//        var_dump($roles);
//        die();


//        $controllers = array('users', 'index', 'producten', 'details', 
//            'logout', 'error', 'noaccess', 'admin:index');
        $controllers = array('users', 'index','producten','page','contact','home','error'
            ,'basket');

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


        // everything for ADMIN
        $acl->allow('ADMIN'); // acces to averything
        
        // everything for USER
        $acl->allow('USER'); // acces to averything
        
        // everything for Guest
        $acl->allow('GUEST'); // acces to averything
        $acl->deny('GUEST','basket');
        
        
        Zend_Registry::set('Zend_Acl', $acl);
    }

}

?>
