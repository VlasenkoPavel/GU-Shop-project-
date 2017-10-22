<?php

namespace controllers;
use core\Application;
use components\Product;

class OrderController extends \core\Controller
{
    private $user_id;
    private $order_id;
    private $total_cost;
    private $products;

    public function __construct()
    {
        $this->user_id = Application::$app->user->getId();
        $order = Application::$app->db->trySql('
            SELECT orders.id, orders.total_cost FROM orders
            INNER JOIN order_statuses on orders.status_id = order_statuses.id
            WHERE order_statuses.status = "open" AND orders.user_id = "' . $this->user_id . '"');
        $this->order_id = $order[0]['id'];
        $this->total_cost =  $order[0]['total_cost'];
        $this->products = Application::$app->db->trySql('
            SELECT products.id, products.name, products.price, sizes.size, colors.color, orders_products.quantity FROM orders_products
            INNER JOIN products on orders_products.product_id = products.id
            INNER JOIN sizes on orders_products.size_id = sizes.id
            INNER JOIN colors on orders_products.color_id = colors.id
            WHERE orders_products.order_id = "' . $this->order_id . '"');
    }

    public function actionGetOpenOrder()
    {
        $cart = [];
        $cart['userId'] = $this->user_id;
        $cart['totalCost'] = $this->total_cost;
        $cart['products'] = $this->products;
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