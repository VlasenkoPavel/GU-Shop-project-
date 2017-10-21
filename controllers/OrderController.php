<?php

namespace controllers;
use core\Application;
use components\Product;

class OrderController extends \core\Controller
{
    private $openOrderId;

    public function actionAddProduct($product_id, $size_id, $color_id)
    {

    }

    public function __construct($user_id)
    {
        $user_id = Application::$app->user->getId();
//        $openOrderId = $this->callOpenOrderId($user_id);
//
//        if($openOrderId) {
//            $this->openOrderId = $openOrderId;
//        } else {
//            $result = Application::$app->db->trySql('
//                INSERT INTO orders (user_id, date_time, total_cost, status_id)
//                VALUES ("' . $user_id . '", "' . date_create() . '", 0, 1');
//
//            if ($result ) {
//                $openOrderId = $this->callOpenOrderId($user_id);
//                $this->openOrderId = $openOrderId;
//
//                if($openOrderId) {
//                    $this->openOrderId = $openOrderId;
//                }
//            }
//        }

    }

    public function actionGetOpenOrder()
    {
        echo ("выводим карзину пользователя с ID: " . Application::$app->user->getId());
    }

    private function callOpenOrderId($user_id) {
        $order = Application::$app->db->trySql('
            SELECT id FROM orders 
            INNER JOIN order_statuses on orders.status_id = order_statuses.id
            WHERE order_statuses.status = "open" AND orders.user_id = "' . $user_id . '"');

        if($order) {
            return $order[0]['id'];
        }
        return null;
    }


}