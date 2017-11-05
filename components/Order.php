<?php
namespace components;
use core\Application;

class Order
{
    private $order_id;
    private $user_id;
    private $total_cost;
    private $products = [];

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
        $this->refresh();
    }

    private function refresh() {
        $order = Application::$app->db->trySql('
            SELECT orders.id, orders.total_cost FROM orders
            INNER JOIN order_statuses on orders.status_id = order_statuses.id
            WHERE order_statuses.status = "open" AND orders.user_id = "' . $this->user_id . '"');
        $order = $order[0];

        if ($order) {
            $this->order_id = $order['id'];
            $this->total_cost =  $order['total_cost'];
            $this->products = $this->getProducts();
            return true;
        } else {
            $this->createNewOpenOrder($this->user_id);
        }

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

    public function getData()
    {
        $cart = [];
        $cart['userId'] = $this->user_id;
        $cart['totalCost'] = $this->total_cost;
        $cart['products'] = $this->products;
        return $cart;
    }

    public function addProduct($product_id, $color, $size,  $quantity)
    {
        $order_id = $this->order_id;
        $color_id = $this->getColorId($color);
        $size_id = $this->getSizeId($size);
        $price = $this->getPrice($product_id);
        $total_cost = $this->total_cost + $price;
        $prodQuantityInOrder = $this->getProdQuantity($product_id, $size_id, $color_id);

        if ($prodQuantityInOrder) {
            $quantity = $quantity + $prodQuantityInOrder;
            Application::$app->db->updateProdQuantity($order_id, $product_id, $size_id, $color_id, $quantity);
            Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
            $this->refresh();
            return $total_cost;
        }

        Application::$app->db->addProdInOrd($order_id, $product_id, $size_id, $color_id, $quantity);
        Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
        $this->refresh();
       return $total_cost;
    }

    public function removeProduct ($product_id, $color, $size)
    {
        $order_id = +$this->order_id;
        $size_id = $this->getSizeId($size);
        $color_id = $this->getColorId($color);
        $price = $this->getPrice ($product_id);
        $total_cost = $this->total_cost - $price;
        $quantity = $this->getProdQuantity($product_id, $size_id, $color_id);
        if ($quantity == 1) {
            Application::$app->db->deleteProd($order_id, $product_id, $size_id, $color_id);
            Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
            $this->refresh();
            return [$order_id, $product_id, $size_id, $color_id];
        }
        $quantity = $quantity - 1;
        Application::$app->db->updateProdQuantity($order_id, $product_id, $size_id, $color_id, $quantity);
        Application::$app->db->updateOrderTotalCost($order_id, $total_cost);
        $this->refresh();
        return $quantity;
    }

    public function removeAllProducts ()
    {
        $order_id = +$this->order_id;
        $result = Application::$app->db->connection->query('
            DELETE FROM orders_products
            WHERE order_id = "'.$order_id.'"
        ');
        $this->refresh();
        return $result;
    }

    public function resetOrderTotalCost ()
    {
        $order_id = 1;
        $result = Application::$app->db->connection->query('
            UPDATE orders
            SET total_cost=0 
            WHERE id="'.$order_id .'"
        ');
        $this->refresh();
        return $result;
    }

    private function getProdQuantity($product_id, $size_id, $color_id)
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
}
