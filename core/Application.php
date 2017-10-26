<?php
namespace core;

class Application
{
    public static $app;
    private $request;
    public $db;
    public $user;

    private function __construct(){}
    private function __wakeup(){}
    private function __clone(){}

    public static function run($config = null)
    {
        if(empty(self::$app)){
            self::$app = new self();
            self::$app->autoload();
            self::$app->db = Db::init();
            self::$app->request = new Request();
            self::$app->user = self::checkUser();
            self::$app->request->init();
//            var_dump(self::$app->user->getPermission());
        }
        return self::$app;
    }

    private function autoload ()
    {
        spl_autoload_register( function($className)
        {
            $className = ltrim($className, '\\');
            $filename = '';
            $namespace = '';

            if($lastNsPos = strrpos($className, '\\'))
            {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $filename = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            //Итоговый путь к файлу с классом для подключения
            $filename .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

            if(file_exists($filename)){
                require_once $filename;
                return true;
            }
            return false;
        });
    }

    public function setUser($user)
    {
        self::$app->user = $user;
    }


    public static function checkUser()
    {
        $user = \controllers\UserController::callUser($_COOKIE['login'], $_COOKIE['password']);

        if ( !$user ) {
            \components\User::removeCookie();
        }

        return $user;
    }
}