<?php

namespace controllers;
use core\Application;
use components\Product;

class OrderController extends \core\Controller
{
//    private $openOrderId;
//
//    public function actionAddProduct($product_id, $size_id, $color_id)
//    {
//
//    }

//    public function __construct($user_id)
//    {
//        $user_id = Application::$app->user->getId();
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
//
//    }

    public function actionGetOpenOrder()
    {
        $cart = [];
        $user_id = Application::$app->user->getId();
        $order = Application::$app->db->trySql('
            SELECT orders.id, orders.total_cost FROM orders
            INNER JOIN order_statuses on orders.status_id = order_statuses.id
            WHERE order_statuses.status = "open" AND orders.user_id = "' . $user_id . '"');
        $order_id = $order[0]['id'];
        $total_cost =  $order[0]['total_cost'];
        $products = Application::$app->db->trySql('
            SELECT * FROM orders_products
            INNER JOIN products on orders_products.product_id = products.id
            INNER JOIN sizes on orders_products.size_id = sizes.id
            INNER JOIN colors on orders_products.color_id = colors.id
            WHERE orders_products.order_id = "' . $order_id . '"');
        $cart['user_id'] = $user_id;
        $cart['total_cost'] = $total_cost;
        $cart['products'] = $products;
        echo json_encode( $cart );
    }

//    private function callOpenOrderId($user_id) {
//        $order = Application::$app->db->trySql('
//            SELECT id FROM orders
//            INNER JOIN order_statuses on orders.status_id = order_statuses.id
//            WHERE order_statuses.status = "open" AND orders.user_id = "' . $user_id . '"');
//
//        if($order) {
//            return $order[0]['id'];
//        }
//        return null;
//    }
}