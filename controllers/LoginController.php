<?php
namespace controllers;

class LoginController extends \core\Controller
{
    public function __construct()
    {
        $this->layout = 'login';
    }

    public function actionIndex () {
        $this->render();
    }

    public function actionAjax () {
        $user = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        if (empty($user) || empty($password)) echo 0;
        else {
            $users = new Users();
            echo $users->checkUserInDb($user, $password) ? 1 : 0;
        }
    }

//    public function actionOut () {
//        $users = new Users();
//        $users->out();
//        header('Location: /login');
//    }
}