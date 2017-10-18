<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once VIEWS_DIR . '__head.php'; ?>
    <title>New arrivals</title>
</head>
<body>
<div class="container">
    <?php require_once  VIEWS_DIR . '__header.php' ?>
    <main class="main">
        <div class="stretchable-wrapper stretchable-wrapper_new-arrivals">
            <div class="content-wrapper">
                <div class="new-arrivals">
                    <h1 class="new-arrivals__page-heading">new arrivals</h1>
                    <nav class="new-arrivals-menu">
                        <a href="#" class="new-arrivals-menu__item">home</a>
                        <a href="#" class="new-arrivals-menu__item">men</a>
                        <a href="#" class="new-arrivals-menu__item">new arrivals</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="stretchable-wrapper_new-arrivals-slider">
            <div class="content-wrapper">
                <div class="single-page-slider">
                    <a href="#" role="button" class="slider-button" onclick="return false">‹</a>
                    <img src="<?= PROD_IMG_CATALOG . $this->product->getProductId().'.jpg' ?>" alt="" class="single-page-slider__image">
                    <a href="#" role="button" class="slider-button" onclick="return false">›</a>
                </div>
            </div>
        </div>
        <div class="content-wrapper content-wrapper_main">
            <section class="product-choice">
                <p class="product-choice__colection-name">women collections</p>
                <h2 class="product-choice__product-name">Moschino Cheap And Chic</h2>
                <p class="product-choice__product-short-description">Compellingly actualize fully researched processes before proactive outsourcing. Progressively syndicate collaborative architectures before cutting-edge services. Completely visualize parallel core competencies rather than exceptional portals.</p>
                <p class="product-choice__mateial">MATERIAL:
                    <b class="product-choice__mateial-name">COTTON</b></p>
                <p class="product-choice__designer">DESIGNER:
                    <b class="product-choice__designer-name">BINBURHAN</b></p>
                <p class="product-choice__price">$561</p>
                <form action="" class="product-choice__form">
                    <div class="c-color-select">
                        <ul class="l-drop-menu">
                            <li class="l-drop-menu__item_color">
                                <a href="#" class="c-color-select__item-link" onclick="return false">red</a>
                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_color">
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-color-select__sub-menu-item-link c-color-select__sub-menu-item-link_green" onclick="return false">green</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-color-select__sub-menu-item-link c-color-select__sub-menu-item-link_blue" onclick="return false">blue</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="c-size-select">
                        <ul class="l-drop-menu">
                            <li class="l-drop-menu__item_size">
                                <a href="#" class="c-size-select__item-link" onclick="return false">XXL</a>
                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_size">
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">XL</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">L</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">M</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">s</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">xs</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="c-quantity-select">
                        <input class="c-quantity-select__input" id="quantity" type="number" value="1" step="1">
                    </div>
                    <a href="#" class="button button_product-choice-button" role="button" onclick="return false">add to cart</a>
                </form>
            </section>
            <aside class="products-section content-wrapper__products-section">
                <h3 class="product-section-heding">you may like also</h3>
                <div class="content"></div>
            </aside>
        </div>
    </main>
    <?php require_once VIEWS_DIR. '__footer.php'; ?>
</div>
</body>
</html>