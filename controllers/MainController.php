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
        $this->layout = 'ProductPage';
        echo $this->render('__products-wrapper', $products);
    }

//    public function actionShowMenJackets()
//    {
//        $this->layout = 'Catalogue';
//        echo $this->render('__products-wrapper_narrow');
//    }

    public function actionShowCatalogue()
    {
        $this->layout = 'Catalogue';
        echo $this->render('__products-wrapper_narrow');
    }

    public function actionShowWomenCoats()
    {
        $this->layout = 'Catalogue';
        $products = $this->catalogue->getWomenCoats();
        echo $this->render('__products-wrapper_narrow', $products);
    }

    public function actionAjaxGetProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type =  isset($_POST['type']) ? $_POST['type'] : 'coats';
            $category = isset($_POST['category']) ? $_POST['category'] : 'women';
            $min = isset($_POST['min']) ? + $_POST['min'] : 0;
            $limit = isset($_POST['limit']) ? + $_POST['limit'] : 6;
            $products = $this->catalogue->getProductsByTypeAndCategory($type, $category,$min, $limit);
            echo json_encode($products);
            die();
        }
        echo "ошибка запроса";
    }

}
