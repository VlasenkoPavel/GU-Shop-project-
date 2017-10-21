<?php
date_default_timezone_set('Europe/Moscow');

define( 'SITE_ROOT', __DIR__. DIRECTORY_SEPARATOR);
define( 'PUBLIC_DIR', SITE_ROOT . 'GU-Shop-Reposit' . DIRECTORY_SEPARATOR );
define( 'CORE_ROOT', PUBLIC_DIR . 'core' . DIRECTORY_SEPARATOR );
define( 'CNT_DIR', PUBLIC_DIR . 'controllers' . DIRECTORY_SEPARATOR );
define( 'LIB_DIR', PUBLIC_DIR . 'components' . DIRECTORY_SEPARATOR );
define( 'VIEWS_DIR', PUBLIC_DIR . 'views' . DIRECTORY_SEPARATOR );
define( 'LAYOUTS_DIR', VIEWS_DIR . 'layouts' . DIRECTORY_SEPARATOR );
//define( 'CSS_DIR', preg_replace("/\\\\/", "/", PUBLIC_DIR . 'content' . DIRECTORY_SEPARATOR  . 'css' . DIRECTORY_SEPARATOR ));

define( 'CSS_CATALOG', 'http://localhost/content/css/');
define( 'INDEX', 'http://localhost/index.php/');
define( 'IMG_CATALOG', 'http://localhost/content/css/');
define( 'PROD_IMG', 'http://localhost/content/img/');
define( 'PROD_IMG_CATALOG', 'http://localhost/content/img/img_products/');
define( 'JS_CATALOG', 'http://localhost/scripts/');






