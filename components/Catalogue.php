<?php
namespace components;
use core\Application;

class Catalogue
{
    public function getNewProducts ()
    {
        $result = Application::$app->db->trySql('SELECT * FROM products LIMIT 4');
        return $result;
    }

    public function getMenJackets ($min, $limit)
    {
        $products = Application::$app->db->getLimitedDataByCategoryAndType(
            "SELECT products.id, products.name, products.price FROM products 
            INNER JOIN types on products.type_id = types.id
            INNER JOIN categoryes on products.category_id = categoryes.id
            WHERE types.type = :typeName 
            AND categoryes.category = :categoryName 
            LIMIT :minNum, :limit"
            , 'jackets', 'men', $min,  $limit);

        $prodCount = Application::$app->db->getCountDataByCategoryAndType('jackets', 'men');

        if( is_int(+$prodCount) && is_array($products) ){
            $result = [
                'products' => $products,
                'count' => $prodCount
            ];
         } else {
            echo 'query error';
        };

        return $result;
    }

    public function getProductsByTypeAndCategory ($type, $category,$min, $limit)
    {
        $products = Application::$app->db->getLimitedDataByCategoryAndType(
            "SELECT products.id, products.name, products.price FROM products 
            INNER JOIN types on products.type_id = types.id
            INNER JOIN categoryes on products.category_id = categoryes.id
            WHERE types.type = :typeName 
            AND categoryes.category = :categoryName 
            LIMIT :minNum, :limit"
            , $type, $category, $min,  $limit);

        $prodCount = Application::$app->db->getCountDataByCategoryAndType('jackets', 'men');

        if( is_int(+$prodCount) && is_array($products) ){
            $result = [
                'products' => $products,
                'count' => $prodCount
            ];
         } else {
            echo 'query error';
        };

        return $result;
    }

    public function getWomenCoats ()
    {
        $result = Application::$app->db->trySql(" SELECT products.id, products.name, products.price FROM products 
          INNER JOIN types on products.type_id = types.id
          INNER JOIN categoryes on products.category_id = categoryes.id
          WHERE types.type = 'coats' AND categoryes.category = 'women' ");
        return $result;
    }
}