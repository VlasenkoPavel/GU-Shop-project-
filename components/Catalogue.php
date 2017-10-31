<?php
namespace components;
use core\Application;
use \PDO;

class Catalogue
{
    public function getNewProducts ()
    {
        $result = Application::$app->db->trySql('SELECT * FROM products LIMIT 4');
        return $result;
    }

    public function getMenJackets ( $min, $limit )
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

        if( is_int( + $prodCount ) && is_array( $products ) ){
            $result = [
                'products' => $products,
                'count' => $prodCount
            ];
         } else {
            echo 'query error';
        };

        return $result;
    }

    public function getProductsByTypeAndCategory ( $type, $category,$min, $limit )
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

        if( is_int( + $prodCount ) && is_array( $products ) ){
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
        $result = Application::$app->db->trySql("
          SELECT products.id, products.name, products.price 
          FROM products 
          INNER JOIN types on products.type_id = types.id
          INNER JOIN categoryes on products.category_id = categoryes.id
          WHERE types.type = 'coats' AND categoryes.category = 'women' 
          ");
        return $result;
    }

    public static function getProdIdByName($name) {
        $result = Application::$app->db->trySql('
        SELECT id
        FROM products
        WHERE  products.name = "'.$name.'"
        ');
        $id = + $result[0]['id'];
        return $id;
    }

    public static function getTypes() {
        $result = Application::$app->db->trySql('
        SELECT id, types.type
        FROM types
        ');
        return $result;
    }

    public static function getCategoryes() {
        $result = Application::$app->db->trySql('
        SELECT id, category
        FROM categoryes
        ');
        return $result;
    }

    public static function getBrands() {
        $result = Application::$app->db->trySql('
        SELECT id, brand
        FROM brands
        ');
        return $result;
    }

    public static function getProductById($id) {
        $result = Application::$app->db->trySql('
        SELECT products.name, products.price
        FROM products
        WHERE id = "'. $id .'"
        ');
        return $result;
    }

    public static function addProdInDb($product_name, $type_id, $brand_id, $category_id, $price, $discount, $feature_id)  {

        $sth = Application::$app->db->connection->prepare("
            INSERT INTO products
            (products.name, type_id, brand_id, category_id, price, discount, feature_id)
            VALUES (:product_name, :type_id, :brand_id, :category_id, :price, :discount, :feature_id)
        ");

        $sth->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $sth->bindParam(':type_id', $type_id, PDO::PARAM_INT);
        $sth->bindParam(':brand_id', $brand_id, PDO::PARAM_INT);
        $sth->bindParam(':category_id', $category_id, PDO::PARAM_INT);
        $sth->bindParam(':price', $price, PDO::PARAM_INT);
        $sth->bindParam(':discount', $discount, PDO::PARAM_INT);
        $sth->bindParam(':feature_id', $feature_id, PDO::PARAM_INT);
        $sth->execute();
    }
}