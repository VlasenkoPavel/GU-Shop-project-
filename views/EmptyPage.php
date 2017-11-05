<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once VIEWS_DIR . $this->pageHeadName . '.php'; ?>
    <title><?= $this->pageName; ?></title>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
    <main class="main">
        <?php require_once VIEWS_DIR . '__page-heading.php'; ?>
        <div class="content-wrapper content-wrapper_main">
            <div class="content"></div>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>