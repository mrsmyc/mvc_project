<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class AccountController extends Controller{


    public function loginAction() {
        if($_POST) {
            $data = [
                'login' => $_POST['login'],
                'password' => $_POST['password'],
            ];
            $data = $this->model->login($data);
            if(empty($data['errors'])) {
                setcookie('user_role', $data[0]['role']);
                $this->view->redirect('/');
            }else {
                $this->view->render('Вход', $data);
            }
        }else {
            $this->view->render('Вход');
        }
    }

    public function logoutAction() {
        session_destroy();
        setcookie("PHPSESSID","",time()-3600,"/");
        setcookie("user_role","",time()-3600,"/");
        $this->view->redirect('/');        
    }

}