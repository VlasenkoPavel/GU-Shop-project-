<?php

namespace controllers;
use components\Order;
use core\Application;
use components\Product;
use \PDO;

class OrderController extends \core\Controller
{
    private $order;
    private $user_id;
    protected $pageName;
    protected $pageHeadName;

    public function __construct()
    {
        $user_id = Application::$app->user->getId();

        $orderQuery= Application::$app->db->trySql('
            SELECT id
            FROM orders
            WHERE user_id = "' . $user_id  . '"');
        $orderId = $orderQuery[0]['id'];

        if ($orderId) {
            $this->order = new Order($user_id);
        } else {
            $date_time = date('Y-m-d');
            $this->createNewOpenOrder($user_id, $date_time);
            $this->order = new Order($user_id);
        }
    }

    public function actionGetOpenOrder()
    {
        $cart = $this->order->getData();
        echo json_encode($cart);
        die();
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
        $product_id = +$_GET['product_id'];
        $color= $_GET['color'];
        $size= $_GET['size'];
        $result = $this->order->removeProduct($product_id, $color, $size);
        echo json_encode($result);
        die();
    }

    public function actionRemoveAllProdFromOpenOrd ()
    {
        if( $_GET['removeAllproducts'] ){
            $this->order->removeAllProducts();
            $this->order->resetOrderTotalCost();
            echo json_encode('true' );
            die();
        }
    }

    public function actionShowCartPage()
    {
        $this->pageName = "Shoping Cart";
        $this->pageHeadName = '__headCart';
        $this->layout = 'EmptyPage';
        echo $this->render('__cart');
    }

    private function createNewOpenOrder($user_id, $date_time) {
        $sth = Application::$app->db->connection->prepare("
                INSERT INTO orders
                (user_id, date_time, total_cost, status_id)
                VALUES (:user_id, :date_time,0 ,1)
            ");
        $sth->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $sth->bindParam(':date_time', $date_time, PDO::PARAM_STR);
        $sth->execute();
    }
}