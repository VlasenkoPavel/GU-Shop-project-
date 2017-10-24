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
        $this->refresh();
    }

    private function refresh() {
        $order = Application::$app->db->trySql('
            SELECT orders.id, orders.total_cost FROM orders
            INNER JOIN order_statuses on orders.status_id = order_statuses.id
            WHERE order_statuses.status = "open" AND orders.user_id = "' . $this->user_id . '"');
        $this->order_id = $order[0]['id'];
        $this->total_cost =  $order[0]['total_cost'];
        $this->products = $this->getProducts();
    }

    private function getProducts() {
        $products = Application::$app->db->trySql('
            SELECT products.id, products.name, products.price, sizes.size, colors.color, orders_products.quantity FROM orders_products
            INNER JOIN products on orders_products.product_id = products.id
            INNER JOIN sizes on orders_products.size_id = sizes.id
            INNER JOIN colors on orders_products.color_id = colors.id
            WHERE orders_products.order_id = "'. $this->order_id .'"');
        return  $products;
    }

    private function echoJsonProducts() {
        $products = $this->getProducts();
        echo json_encode($products);
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

        $color_id = $this->getColorId($color);

        $size_id = $this->getSizeId($size);

        $product_id = +$_GET['product_id'];
        $quantity = +$_GET['quantity'];

        $price = $this->getPrice($product_id);
        $total_cost = $this->total_cost + $price;

        $prodQuantityInOrder = $this->getProdQuantity($product_id, $size_id, $color_id);

        if ($prodQuantityInOrder) {
            $quantity = $quantity + $prodQuantityInOrder;
            Application::$app->db->updateProdQuantity($order_id, $product_id, $size_id, $color_id, $quantity);
            Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
            $this->refresh();
//            $this->echoJsonProducts();
            echo json_encode($total_cost);
            die();
        }

        Application::$app->db->addProdInOrd($order_id, $product_id, $size_id, $color_id, $quantity);
        Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
        $this->refresh();

//        $this->echoJsonProducts();
        echo json_encode($price );
    }

    public function actionRemoveProdFromOpenOrd ()
    {
        $order_id = +$this->order_id;
        $product_id = +$_GET['product_id'];
        $color= $_GET['color'];
        $size= $_GET['size'];
        $size_id = $this->getSizeId($size);
        $color_id = $this->getColorId($color);
        $price = $this->getPrice ($product_id);
        $quantity = $this->getProdQuantity($product_id, $size_id, $color_id);
        if ($quantity == 1) {
            Application::$app->db->deleteProd($order_id, $product_id, $size_id, $color_id);
            $this->refresh();
//            echo json_encode([$order_id, $product_id, $size_id, $color_id]);
            echo json_encode([$order_id, $product_id, $size_id, $color_id]);
            die();
        }
        $quantity = $quantity - 1;
        Application::$app->db->updateProdQuantity($order_id, $product_id, $size_id, $color_id, $quantity);
        $this->refresh();
        echo json_encode([$quantity]);
    }

    protected function getProdQuantity($product_id, $size_id, $color_id)
    {
        $quantity = Application::$app->db->trySql('
            SELECT quantity
            FROM orders_products
            WHERE product_id = "'.$product_id.'"
            AND size_id = "'.$size_id.'"
            AND color_id = "'.$color_id.'"
            ');
        $quantity = +$quantity[0]['quantity'];
        return $quantity;
    }
    private function getSizeId ($size) {
        $size_id = Application::$app->db->trySql('
            SELECT id
            FROM sizes
            WHERE sizes.size = "'.$size .'"
            ');
        $size_id = +$size_id[0]['id'];
        return $size_id;
    }

    private function getColorId ($color) {
        $color_id = Application::$app->db->trySql('
            SELECT id
            FROM colors
            WHERE color = "'.$color .'"
            ');
        $color_id = +$color_id[0]['id'];
        return $color_id;
    }
    private function getPrice ($product_id) {
        $price = Application::$app->db->trySql('
            SELECT price
            FROM products
            WHERE id = "'.$product_id.'"
            ');
        $price = +$price[0]['price'];
        return $price;
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