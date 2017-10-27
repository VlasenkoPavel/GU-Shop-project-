<?php
namespace controllers;
use \components\User;
use core\Application;

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
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

            $user = self::callUser( $_POST[ 'login' ], $_POST[ 'password' ]);

            if ( $user  ) {
                Application::$app->setUser($user);
                $this->userData = $user->getData();
                $this->message  = 'wellcome ' . $this->userData[ 'name' ];
                $promission = $user->getPermission();

                if ( $promission = 'admin') {
                    echo $this->render( '__admin-panel', $this->userData );
                    return true;
                }

                echo $this->render( '__account', $this->userData );
                return true;

            } else {

                $this->renderLogWithMessage( "user with such combination of login and password not found" );
                return false;
            }
        }

        $this->renderLogWithMessage( "enter login and password" );
        return false;
    }

    public function actionExit() {
        User::removeCookie();
        Application::$app->user = null;
        header( "Location: $_SERVER[HTTP_REFERER]" );
    }

//    public function actionShowAdminPanel() {
//        if ( ! (Application::$app->user) || Application::$app->user->getPermission() !== 'admin') {
//            echo 'access denied';
//        }
//        else {
//            echo $this->render( '__admin-panel', Application::$app->user->getData() );
//        }
//    }

    public static function callUser ( $login, $password )
    {
        if ( $login && $password ) {
            $user = new User( $login, $password );
            $userId =  $user->getId();

            if ( $userId  ) {
                return $user;
            }
        }
        return null;
    }

    private function renderLogWithMessage( $message ) {
        $this->message = $message;
        echo $this->render( '__login' );
    }

}