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

    public function actionAddProdToOpenOrd()
    {
        $color = $_GET['color'];
        $size = $_GET['size'];

        $order_id = $this->order_id;

        $color_id = Application::$app->db->trySql('
            SELECT id
            FROM colors
            WHERE color = "'.$color .'"
            ');
        $color_id = +$color_id[0]['id'];

        $size_id = Application::$app->db->trySql('
            SELECT id
            FROM sizes
            WHERE sizes.size = "'.$size .'"
            ');
        $size_id = +$size_id[0]['id'];

        $product_id = +$_GET['product_id'];
        $quantity = +$_GET['quantity'];

        $prodQuantityInOrder = $this->getProdQuantity($product_id, $size_id, $color_id);

        if ($prodQuantityInOrder) {
            $quantity = $quantity + $prodQuantityInOrder;
            Application::$app->db->updateProdQuantity($order_id, $product_id, $size_id, $color_id, $quantity);
            echo json_encode([$prodQuantityInOrder , 'товар уже в корзине']);
            die();
        }

        Application::$app->db->addProdInOrd($order_id, $product_id, $size_id, $color_id, $quantity);
        echo json_encode([$prodQuantityInOrder]);
    }

    protected function getProdQuantity($product_id, $size_id, $color_id)
    {
        $product_id = Application::$app->db->trySql('
            SELECT quantity
            FROM orders_products
            WHERE product_id = "'.$product_id.'"
            AND size_id = "'.$size_id.'"
            AND color_id = "'.$color_id.'"
            ');
        $product_id = +$product_id[0]['quantity'];
        return $product_id;
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