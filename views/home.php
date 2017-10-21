<!DOCTYPE html>
<head>
    <?php
        $layout = VIEWS_DIR . '__head-home.php';
        require_once $layout;
    ?>
    <title>Shop home</title>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
	<main class="main">
        <?php require_once VIEWS_DIR . '__home-page-slider.php'; ?>
		<div class="content-wrapper content-wrapper_main">
            <?php require_once VIEWS_DIR . '__home-page-info-section.php'; ?>
            <section class="products-section content-wrapper__products-section">
                <h3 class="product-section-heding">
                    featured items<br>
                    <p class="product-section-heding__small-text">Shop for items based on what we featured in this week</p>
                </h3>
                <div class="content"></div>
                <a href="#" class="button button_red products-section__button" onclick="return false">Browse All Products →</a>
            </section>
            <?php require_once VIEWS_DIR . '__home-page-bottom-banner.php'; ?>
		</div>
	</main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>