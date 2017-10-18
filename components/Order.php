<?php
namespace components;
use core\Application;

class Order
{
    private $id;
    private $user_id;
    private $date_time;
    private $total_cost;
    private $status;
    private $products = [];

    public function __construct($id)
    {
        $result = Application::$app->db->trySql('SELECT * FROM orders WHERE id = "' . $id . '"');

        if ($result[0]) {
            $this->id = $result[0]['id'];
            $this->name = $result[0]['user_id'];
            $this->type_id = $result[0]['date_time'];
            $this->brand_id = $result[0]['total_cost'];
            $this->category_id = $result[0]['status'];
        }

        $productsResult = Application::$app->db->trySql('
            SELECT products.id, sizes.size, colors.color 
            FROM orders_products 
            INNER JOIN products on orders_products.product_id = products.id
            INNER JOIN sizes on orders_products.size_id = sizes.id
            INNER JOIN colors on orders_products.color_id = colors.id
            WHERE order_id  = "' . $id . '" 
            ');

        if ($productsResult) {
            $this->products = $productsResult;
        }
    }

    public function getId ()
    {
        return $this->id;
    }
}