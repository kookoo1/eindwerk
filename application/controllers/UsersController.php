<?php

class UsersController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // action body
    }

    public function loginAction() {
        $t = Zend_Registry::get("Zend_Translate");

        $loginForm = new Application_Form_Login();
        $this->view->form = $loginForm;

        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost(); // $_POST
            if ($this->view->form->isValid($postParams)) {
                $params = $this->view->form->getValues();

//                var_dump($params);
//                die();
                $auth = Zend_Auth::getInstance();

                // meegeven welke database driver we gebruiken
                $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Registry::get('db'));

                // login
                $authAdapter->setTableName('users')
                        ->setIdentityColumn('username')
                        ->setCredentialColumn('passwd')
                        ->setIdentity($params['login'])
                        ->setCredential(MD5($params['passwd']));
//                        ->setCredential($params['passwd']);

                // login uitvoeren
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    //die('ingelogged');
                    echo $t->translate('login.say');

//                    $url = $this->getRequest()->getHeader('Referer')->getUrl();
//                    $this->redirect()->toUrl($url);
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

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
    }

    public function signupAction() {
        // action body

        $t = Zend_Registry::get("Zend_Translate");
        $signupForm = new Application_Form_Signup();
        $this->view->form = $signupForm;

        if ($this->getRequest()->getPost()) {
            $postParams = $this->getRequest()->getPost(); // $_POST
//            
            if ($this->view->form->isValid($postParams)) {

                $usersModel = new Application_Model_Users();


                if ($postParams['passwd'] != $postParams['confirmPasswd']) {
                    //$this->view->errorMessage = "Password and confirm password don't match.";
                    //echo "Password and confirm password don't match.";
                    echo $t->translate('signup.passwdnotmatch');
                    return;
                }
                //here we do some checks 
                if ($usersModel->checkUnique($postParams['username'])) {
                    // $this->view->errorMessage = "Name already taken. Please choose      another one.";
                    echo $t->translate('signup.nameInUsed');
                    return;
                }
                unset($postParams['submit']); // we schrijven de knop niet weg ...
                unset($postParams['confirmPasswd']);

                  $postParams['passwd'] = md5($postParams['passwd']);
//                $postParams['passwd'] = $postParams['passwd'];
                $usersModel->addUser($postParams);

                $userParams = $usersModel->getUserByIdentity($postParams['username']);

                $paramsUserRole = array('usersID' => $userParams['usersID'], 'rolesId' => '1'); // default we are role = USER
                //
                //
                $usersRolesModel = new Application_Model_UsersRoles();
                $usersRolesModel->addNewUser($paramsUserRole);
                //
                //$this->_redirect($this->view->url(array('controller' => 'Nieuws1', 'action' => 'overzicht')));
                $locale = Zend_Registry::get('Zend_Locale');

                // we redirest to the login screen
                $this->_redirect($this->view->url(
                                array('lang' => $locale->toString()), "login"));
            }
        }
    }

}