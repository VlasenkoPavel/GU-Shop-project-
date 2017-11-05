<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    $layout = VIEWS_DIR . '__head.php';
    require_once $layout;
    ?>
    <title>User page</title>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
    <main class="main">
        <div class="stretchable-wrapper stretchable-wrapper_new-arrivals">
            <div class="content-wrapper">
                <div class="new-arrivals">
                    <h1 class="new-arrivals__page-heading">Account</h1>
                 </div>
            </div>
        </div>
        <div class="content-wrapper content-wrapper_main">
            <div class="content"></div>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>