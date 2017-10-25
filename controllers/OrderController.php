<?php

namespace controllers;
use components\Order;
use core\Application;
use components\Product;

class OrderController extends \core\Controller
{
    private $order;
    private $user_id;

    public function __construct()
    {
        $user_id = Application::$app->user->getId();
        if($user_id) {
            $this->order = new Order($user_id);
        }
    }

    public function actionGetOpenOrder()
    {
        $cart = $this->order->getData();
            echo json_encode($cart);
    }

    public function actionAddProdToOpenOrd()
    {
        $color = $_GET['color'];
        $size = $_GET['size'];
        $product_id = +$_GET['product_id'];
        $quantity = +$_GET['quantity'];
        $result = $this->order->addProduct($product_id, $color, $size,  $quantity);
        echo ($result);
        die();
    }

    public function actionRemoveProdFromOpenOrd ()
    {
        $result = $this->order->removeProduct();
        echo json_encode($result);
        die();
    }
}