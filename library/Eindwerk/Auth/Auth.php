<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author webmaster
 */
class Eindwerk_Auth_Auth extends Zend_Controller_Plugin_Abstract {

    //put your code here

    public function preDispatch(\Zend_Controller_Request_Abstract $request) {

        $loginController = 'Users';
        $loginAction = 'login';
        $locale = Zend_Registry::get('Zend_Locale');
        $auth = Zend_Auth::getInstance(); // wordt maar eenmaal gebruikt disgn pattern singleton ==> static function
        // auth controle uitvoeren
        // if user is not logged in and is not requesting the logon page
        // - redirect to loginpage
         // when no indentity we set them on 'GUEST', so we can show the products
         // 
        // but we can't order them
        if (!$auth->hasIdentity()) {
            $dbAdapter = Zend_Db_Table::getDefaultAdapter();
            $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);
            $authAdapter->setTableName('users')
                    ->setIdentityColumn('username')
                    ->setCredentialColumn('passwd')
                    ->setIdentity('guest')
                    ->setCredential('guest');
             $result = $auth->authenticate($authAdapter);
        }
           
        if (!$auth->hasIdentity() && $request->getControllerName() != $loginController && $request->getActionName() != $loginAction) {

            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            //die ('hier');
            $locale = Zend_Registry::get('Zend_Locale');
            $url = '/' . $locale . '/login';

            //die('heir stop ik logon');
            $redirector->gotoUrl($url);
        }


        if ($auth->hasIdentity()) {
            // hier de rechten kontroleren
            //die('Hello user *wave*');

            $registry = Zend_Registry::getInstance();
            $acl = $registry->get('Zend_Acl');
            $identity = $auth->getIdentity();

            $usersModel = new Application_Model_Users();
            $user = $usersModel->getUserByIdentityRole($identity);

            $role = $user->role;
            if ($request->getModuleName() !== 'default' && $request->getModuleName() !== NULL) { // ook het type variable controleren
                $isAllowed = $acl->isAllowed($role, $request->getModuleName() . ':' .
                        $request->getControllerName(), $request->getActionName());
            } else {
                $isAllowed = $acl->isAllowed($role, $request->getControllerName(),
                        $request->getActionName());
            }

//            var_dump($request);
//            var_dump($isAllowed);
            //die();
            
            if (!$isAllowed) {
                $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
                //$redirector->gotoUrl('/noaccess');
                $redirector->gotoUrl('/' . $locale . '/login');
            }
        }
    }

    
    
}

?>
