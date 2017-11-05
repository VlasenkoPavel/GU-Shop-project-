<?php

namespace controllers;
use components\Catalogue;
use components\Product;
use core\Application;

class MainController extends \core\Controller
{
    public $product;
    private $catalogue;
    public function __construct()

    {
        $this->layout = 'home';
        $this->catalogue = new Catalogue();
    }

    public function actionIndex()
    {
        $products = $this->catalogue->getNewProducts();
        echo $this->render('__products-wrapper', $products);
    }

    public function actionShowProductPage()
    {
        $productId = $_GET['product_id'];
        $this->product = new Product($productId);
        $products = $this->catalogue->getNewProducts();
        $this->pageName = 'Catalogue';
        $this->layout = 'ProductPage';
        echo $this->render('__products-wrapper', $products);
    }

    public function actionShowCatalogue()
    {
        $this->pageName = 'Catalogue';
        $this->layout = 'Catalogue';
        echo $this->render('__products-wrapper_narrow');
    }

    public function actionAjaxGetProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type =  isset($_POST['type']) ? $_POST['type'] : 'jackets';
            $category = isset($_POST['category']) ? $_POST['category'] : 'men';
            $min = isset($_POST['min']) ? + $_POST['min'] : 0;
            $limit = isset($_POST['limit']) ? + $_POST['limit'] : 6;
            $products = $this->catalogue->getProductsByTypeAndCategory($type, $category,$min, $limit);
            echo json_encode($products);
            die();
        }
        echo "ошибка запроса";
    }

}
