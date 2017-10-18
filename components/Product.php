<?php

namespace components;
use core\Application;

class Product
{
    public $id;
    private $name;
    private $type_id;
    private $brand_id;
    private $category_id;
    private $price;
    private $discount;
    private $feature;

    public function __construct($id)
    {
        $result = Application::$app->db->trySql('SELECT * FROM products WHERE id = "' . $id . '"');

        if ($result[0]) {
            $this->id = $result[0]['id'];
            $this->name = $result[0]['name'];
            $this->type_id = $result[0]['type_id'];
            $this->brand_id = $result[0]['brand_id'];
            $this->category_id = $result[0]['category_id'];
            $this->price = $result[0]['price'];
            $this->discount = $result[0]['discount'];
            $this->feature = $result[0]['feature'];
        }
    }

    public function getProductId ()
    {
        return $this->id;
    }

    public function getProductName ()
    {
        return $this->name;
    }
}