<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?= CSS_CATALOG . 'style.css'?>"/>
    <link rel="stylesheet" href="<?= CSS_CATALOG . 'font_awesome/css/font-awesome.min.css'?>">
    <script src="<?= JS_CATALOG . 'jquery-3.2.1.min.js'?>"></script>
    <script src="<?= JS_CATALOG . 'Cart.js'?>"></script>
    <script src="<?= JS_CATALOG . 'mainCartPage.js'?>"></script>
    <title>Shoping chart</title>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
    <main class="main">
        <?php require_once  VIEWS_DIR . '__new-arrivals.php' ?>
        <div class="content-wrapper content-wrapper_main">
            <div class="content"></div>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>