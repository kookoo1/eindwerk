<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $loginForm = new Application_Form_Login();
        $this->view->form = $loginForm;

        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost(); // $_POST
            if ($this->view->form->isValid($postParams)) {
               $params = $this->view->form->getValues();
               $auth = Zend_Auth::getInstance();

                // meegeven welke database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));

                // login
                $authAdapter->setTableName('users')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('passwd')
                        ->setIdentity($params['login'])
                        ->setCredential($params['passwd']);

                // login uitvoeren
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    //die('ingelogged');
                    echo 'U bent ingelogd!';
                } else {
                    //die('fout');
                    // alle foutmeldingen weergeven op het scherm
                    foreach ($result->getMessages() as $message) {
                        echo $message;
                        echo '<br>';
                    }
                }
            } else {
                echo '<br />hier ben ik ook ==> no valid';
            }
        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
   }

    public function guestAction()
    {
                       // meegeven welke database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));

                // login
                $authAdapter->setTableName('users')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('passwd')
                        ->setIdentity('guest')
                        ->setCredential('guest');

                // login uitvoeren
                $result = $auth->authenticate($authAdapter);

    }


}





