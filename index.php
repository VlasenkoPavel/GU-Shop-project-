<?php
require_once '../config.php';
require_once 'core/Application.php';
//echo 'PATH_INFO: '.$_SERVER['PATH_INFO'].'<br>';
core\Application::run();
//var_dump(core\Application::$app->user->getPermission());
