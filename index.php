<?php
require_once '../config.php';
require_once 'core/Application.php';
//echo 'PATH_INFO: '.$_SERVER['PATH_INFO'].'<br>';
core\Application::run();

$user_id = '4';
$date_time = date('Y-m-d');
\controllers\OrderController::createNewOpenOrder($user_id, $date_time);
