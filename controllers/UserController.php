<?php
namespace controllers;
use \components\User;
use core\Application;
use \PDO;

class UserController extends \core\Controller
{
    protected $message;
    protected $userData;
    protected $pageName;
    protected $pageHeadName;

    public function __construct()
    {
        $this->layout = 'EmptyPage';
        $this->pageHeadName = '__headAccount';
    }

    public function actionLogin()
    {
        $this->pageName = 'Login';
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

            $user = self::callUser( $_POST[ 'login' ], $_POST[ 'password' ]);

            if ( $user  ) {
                Application::$app->setUser($user);
                $this->userData = $user->getData();
                $permission = $user->getPermission();

                if ( $permission == 'admin') {
                    header( 'Location: http://localhost/index.php/Admin/ShowAdminPanel');
                    die();
                }

                header( 'Location: http://localhost/index.php/User/ShowAccountPage');
                die();

            } else {

                $this->renderLogWithMessage( "user with such combination of login and password not found" );
                return false;
            }
        }

        $this->renderLogWithMessage( "enter login and password" );
        return false;
    }

    public function actionShowAccountPage() {
        $this->layout = 'EmptyPage';
        $this->pageName = 'Account';
        echo $this->render( '__account', Application::$app->user->getData());
        return true;
    }

    public function actionRegistration()
    {
        $this->pageName = 'Registration';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ( !$this->checkLoginIsFree( $_POST['login'] ) ) {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $country = $_POST['country'];
                $zipcode = + $_POST['zipcode'];
                $address = $_POST['address'];
                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $permissionId = 2;
                $registrationDate = date('Y-m-d');
                $discount = 0;

                UserController::addUserToDb($name, $surname, $registrationDate, $country, $zipcode, $address, $login, $password, $permissionId, $email, $phone, $discount);

                $user = self::callUser( $_POST[ 'login' ], $_POST[ 'password' ]);
                Application::$app->setUser($user);
                header('Location: http://localhost/index.php/User/ShowAccountPage');
                die();
            }
            $this->message = 'login is not free';
            echo $this->render('__registration');
            die();
        }
        $this->message = 'login is not free';
        echo $this->render('__registration');
        die();
    }

    public function actionExit() {
        User::removeCookie();
        Application::$app->user = null;
        header( "Location: $_SERVER[HTTP_REFERER]" );
    }

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
        $this->pageName = 'Login';
        $this->message = $message;
        echo $this->render( '__login' );
    }

    private function checkLoginIsFree( $login ) {
        $response = Application::$app->db->trySql('
        SELECT id
        FROM users
        WHERE  login = "'.$login.'"
        ');
        $result = $response[0]['id'];
        return $result;
    }

    public static function addUserToDb($name, $surname, $registrationDate, $country, $zipcode, $address, $login, $password, $permissionId, $email, $phone, $discount)  {

        $sth = Application::$app->db->connection->prepare("
            INSERT INTO users
            (users.name, surname, registration_date, country, zip_code, address, login, password, permission_id, email, phone, discount)
            VALUES (:uzer_name, :surname, :registration_date, :country,  :zip_code, :address, :login, :password, :permission_id, :email, :phone, :discount)
        ");

        $sth->bindParam(':uzer_name', $name, PDO::PARAM_STR);
        $sth->bindParam(':surname', $surname, PDO::PARAM_STR);
        $sth->bindParam(':registration_date', $registrationDate, PDO::PARAM_STR);
        $sth->bindParam(':country', $country, PDO::PARAM_STR);
        $sth->bindParam(':zip_code', $zipcode, PDO::PARAM_INT);
        $sth->bindParam(':address', $address, PDO::PARAM_STR);
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->bindParam(':permission_id', $permissionId, PDO::PARAM_INT);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':phone', $phone, PDO::PARAM_STR);
        $sth->bindParam(':discount', $discount, PDO::PARAM_INT);
        $sth->execute();
    }
}