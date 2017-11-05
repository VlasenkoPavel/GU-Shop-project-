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

    public function __construct($login, $password)
    {
        $result = Application::$app->db->trySql('
            SELECT * 
            FROM `users` 
            WHERE `login` = "'.$login.'" 
            AND `password` = "'.$password.'"            
            ');

        if ($result[0]) {
            $this->id = $result[0]['id'];
            $this->name = $result[0]['name'];
            $this->surname = $result[0]['surname'];
            $this->registration_date = $result[0]['registration_date'];
            $this->country = $result[0]['country'];
            $this->zip_code = $result[0]['zip_code'];
            $this->address = $result[0]['address'];
            $this->login = $result[0]['login'];
            $this->password = $result[0]['password'];
            $this->email = $result[0]['email'];
            $this->phone = $result[0]['phone'];
            $this->discount = $result[0]['discount'];

            $permission_id = $result[0]['permission_id'];
                $permission = Application::$app->db->trySql('
                SELECT permission 
                FROM `permissions` 
                WHERE id = "'.$permission_id.'"            
            ');

            $this->permission = $permission[0]['permission'];

            $this->setCookie();
        }
    }

    public function getData ()
    {
        return [
            'id' => $this->id,
            'permission' => $this->permission,
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
}
