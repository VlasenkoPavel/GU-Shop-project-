<?php

namespace components;
use core\Application;

class User
{
    private $id;
    private $name;
    private $surname;
    private $registration_date;
    private $country;
    private $zip_code;
    private $address;
    private $login;
    private $password;
    private $permission;
    private $email;
    private $phone;
    private $discount;
    private $lastVisit5 = [];

    public function __construct($login, $password)
    {
        $result = Application::$app->db->trySql('
            SELECT * 
            FROM `users` 
            INNER JOIN permissions
            ON users.permission_id = permissions.id
            WHERE `login` = "'.$login.'" 
            AND `password` = "'.$password.'"
            ');
//        var_dump($result);
        if ($result[0]) {
            $this->id = $result [0] ['id'];
            $this->name = $result[0]['name'];
            $this->surname = $result[0]['surname'];
            $this->registration_date = $result[0]['registration_date'];
            $this->country = $result[0]['country'];
            $this->zip_code = $result[0]['zip_code'];
            $this->address = $result[0]['address'];
            $this->login = $result[0]['login'];
            $this->password = $result[0]['password'];
            $this->permission = $result[0]['permission'];
            $this->email = $result[0]['email'];
            $this->phone = $result[0]['phone'];
            $this->discount = $result[0]['discount'];
            $this->setCookie();
//            $resultVisitSql = Application::$app->db->trySqlWithCallback('SELECT * FROM `last_visit` WHERE `users_id` = "' . $this->userId . '" ORDER BY `timestamp` DESC LIMIT 5');
//            $this->lastVisit5 = [];
//            if (count($resultVisitSql) > 0) {
//                foreach ($resultVisitSql as $arr) {
//                    array_push($this->lastVisit5, $arr['url']);
//                }
//            }
        }
    }

    public function getData ()
    {
        return [
            'name' => $this->name,
            'surname' => $this->surname,
            'registration_date' => $this->registration_date,
            'country' => $this->country,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
            'login' => $this->login,
            'email' => $this->email,
            'phone' => $this->phone,
            'discount' => $this->discount
        ];
    }

    public function getId () {
        return $this->id;
    }

    public function getPermission () {
        return $this->permission;
    }

    private function setCookie()
    {
        setcookie('login', $this->login, time() + (60*60*24*30), "/");
        setcookie('password', $this->password , time() + (60*60*24*30), "/");
    }

    public static function removeCookie ()
    {
        unset($_COOKIE['login']);
        setcookie('login', null, -1, '/');
        unset($_COOKIE['password']);
        setcookie('password', null, -1, '/');
    }

    public function out ()
    {
        self::removeCookie();
    }

//    public function setUserVisitUrl ()
//    {
//        $sql = 'INSERT INTO `last_visit` (`timestamp`, `url`, `users_id`) VALUES ("'.time().'", "'.$_SERVER['REQUEST_URI'].'", "'.$this->userId.'")';
//        Application::$app->db->trySql($sql);
//    }
}
