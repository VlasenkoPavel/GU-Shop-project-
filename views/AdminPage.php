<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once VIEWS_DIR . '__headAdminPanel.php'; ?>
    <title>Admin page</title>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
    <main class="main">
        <?php require_once  VIEWS_DIR . '__new-arrivals.php'; ?>
        <div class="content-wrapper content-wrapper_main">
            <div class="content"></div>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>