<?php
namespace controllers;
use \components\User;
use core\Application;

class AdminController extends \core\Controller
{
    public function __construct()
    {
        $this->layout = 'EmptyPage';
    }

    public function actionShowAdminPanel() {
        if ( ! (Application::$app->user) || Application::$app->user->getPermission() !== 'admin') {
            echo 'access denied';
        }
        else {
            echo $this->render( '__admin-panel', Application::$app->user->getData() );
        }
    }
}