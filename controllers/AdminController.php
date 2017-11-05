<?php
namespace controllers;
use core\Application;
use \components\Catalogue;

class AdminController extends \core\Controller
{
    protected $types;
    protected $categoryes;
    protected $brands;
    protected $pageName;
    protected $pageHeadName;

    public function __construct()
    {
        $this->layout = 'EmptyPage';
        $this->pageName = 'Admin Panel';
        $this->pageHeadName = '__headAdminPanel';
        $this->types = Catalogue::getTypes();
        $this->categoryes = Catalogue::getCategoryes();
        $this->brands = Catalogue::getBrands();
    }

    public function actionShowAdminPanel() {
        if ( ! ( Application::$app->user) || Application::$app->user->getPermission() !== 'admin') {
            echo 'access denied';
        }
        else {
            echo $this->render( '__admin-panel', Application::$app->user->getData() );
        }
    }

    public function actionGetProdIdByName()  {
        $prodName = $_GET[ 'product_name' ];
        $id = Catalogue::getProdIdByName($prodName);
        echo json_encode($id);
    }

    public function actionGetProdById()  {
        $prodId = $_GET[ 'product_id' ];
        $id = Catalogue::getProductById($prodId);
        $id = $id[0];
        echo json_encode($id);
    }

    public function actionAddProdToDb()  {
        $product_name = $_POST[ 'product_name' ];
        $type_id = + $_POST[ 'type_id' ];
        $brand_id = + $_POST[ 'brand_id' ];
        $category_id = + $_POST[ 'category_id' ];
        $price = + $_POST[ 'price' ];
        $discount = $_POST[ 'discount' ] ? (+ $_POST[ 'discount' ]) : null;
        $feature_id = $_POST[ 'feature_id' ] ? + $_POST[ 'feature_id' ]: null;

        Catalogue::AddProdToDb($product_name, $type_id, $brand_id, $category_id, $price, $discount, $feature_id);

        $prodId = Catalogue::getProdIdByName($product_name);
        $prodPageUri = '//localhost/index.php/main/ShowProductPage?product_id=' . $prodId;
        header( "Location: $prodPageUri" );
    }

    public function actionAddCategoryToDb()  {
        $category = $_GET[ 'category' ];
        Catalogue::AddCategoryToDb($category);
        header( "Location: http://localhost/index.php/Admin/ShowAdminPanel" );
    }

    public function actionAddTypeToDb()  {
        $type = $_GET[ 'type' ];
        Catalogue::AddTypeToDb($type);
        header( "Location: http://localhost/index.php/Admin/ShowAdminPanel" );
    }

    public function actionAddBrandToDb()  {
        $brand = $_GET[ 'brand' ];
        Catalogue::AddBrandToDb($brand);
        header( "Location: http://localhost/index.php/Admin/ShowAdminPanel" );
    }

    public function actionDeleteProductFromDb()  {
        $productId = + $_GET[ 'product_id' ];
        Catalogue::DeleteProductFromDb($productId);
        header( "Location: http://localhost/index.php/Admin/ShowAdminPanel" );
    }

    public function actionAddProdImg()  {
        $prodId = $_POST[ 'product_id' ];
        $dirName = 'content/img/img_products/' . $prodId . '/';
        if ( ! file_exists ($dirName )) {
            mkdir($dirName);
        }
        if (is_uploaded_file( $_FILES[ "filename" ][ "tmp_name" ] )) {

            $i = 0;
            while ( true ) {
                $i++;
                $fileName = $prodId . "_" . "$i" . ".jpg";
                $fullPath =  $dirName . $fileName;

                if ( ! file_exists ( $fullPath )) {
                    break;
                }
            }

            $prodPageUri = '//localhost/index.php/main/ShowProductPage?product_id=' . $prodId;
            move_uploaded_file( $_FILES[ "filename" ][ "tmp_name" ], $fullPath);
            header( "Location: $prodPageUri" );

        } else {
            echo( "Ошибка загрузки файла" );
        }
    }

    public function actionShowProductsPanel() {
        echo $this->render( '__admin-products-panel');
        return true;
    }
}