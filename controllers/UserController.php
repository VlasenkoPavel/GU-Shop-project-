<?php
namespace controllers;
use \components\User;

class UserController extends \core\Controller
{
    protected $message;
    protected $userData;

    public function __construct()
    {
        $this->layout = 'EmptyPage';
    }

    public function actionLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = self::callUser($_POST['login'], $_POST['password']);

            if ( $user  ) {

                $this->userData = $user->getData();
                $this->message  = 'wellcome ' . $this->userData['name'];
                echo $this->render('__account', $this->userData);
                return true;

            } else {

                $this->renderLogWithMessage("user with such combination of login and password not found");
                return false;
            }
        }

        $this->renderLogWithMessage("enter login and password");
        return false;
    }

    public static function callUser ($login, $password)
    {
        if ($login && $password) {

            $user = new User($login, $password);
            $userId =  $user->getId();

            if ( $userId  ) {
                return $user;
            }
        }

        return null;
    }

    private function renderLogWithMessage($message) {
        $this->message = $message;
        echo $this->render('__login');
    }

}