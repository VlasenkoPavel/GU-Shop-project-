<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once VIEWS_DIR . '__head.php'; ?>
    <?php
        require_once VIEWS_DIR . '__headProductPage.php';
        $product_id = $this->product->getProductId();
    ?>
    <title>New arrivals</title>
</head>
<body>
<div class="container">
    <?php require_once  VIEWS_DIR . '__header.php' ?>
    <main class="main">
        <?php require_once  VIEWS_DIR . '__new-arrivals.php' ?>
        <div class="stretchable-wrapper_new-arrivals-slider">
            <div class="content-wrapper">
                <div class="single-page-slider">
                    <a href="#" role="button" class="slider-button" onclick="return false">‹</a>
                    <img src="<?php echo PROD_IMG_CATALOG . $product_id . DIRECTORY_SEPARATOR . $product_id.'_1.jpg' ?>
                    " alt="" class="single-page-slider__image">
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
                <form action="#" class="product-choice__form">
                    <input type="hidden" name="product_id" value="<?= $this->product->getProductId() ?>">
                    <div class="c-color-select">
                        <select class="c-color-select__item-link" name="color" id="">
                            <option class="c-color-select__sub-menu-item-link_red" value="red">red</option>
                            <option class="c-color-select__sub-menu-item-link_green" value="green">green</option>
                            <option class="c-color-select__sub-menu-item-link_blue" value="blue">blue</option>
                        </select>
<!--                        <ul class="l-drop-menu">-->
<!--                            <li class="l-drop-menu__item_color">-->
<!--                                <a href="#" class="c-color-select__item-link" onclick="return false">red</a>-->
<!--                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_color">-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-color-select__sub-menu-item-link c-color-select__sub-menu-item-link_green" onclick="return false">green</a>-->
<!--                                    </li>-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-color-select__sub-menu-item-link c-color-select__sub-menu-item-link_blue" onclick="return false">blue</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
                    </div>
                    <div class="c-size-select">
                        <select class="c-size-select__item-link" name="size" id="">
                            <option class="c-size-select__sub-menu-item-link" value="XXL">XXL</option>
                            <option class="c-size-select__sub-menu-item-link" value="XL">XL</option>
                            <option class="c-size-select__sub-menu-item-link" value="L">L</option>
                            <option class="c-size-select__sub-menu-item-link" value="M">M</option>
                            <option class="c-size-select__sub-menu-item-link" value="S">S</option>
                            <option class="c-size-select__sub-menu-item-link" value="XS">XS</option>
                            <option class="c-size-select__sub-menu-item-link" value="XXS">XXS</option>
                        </select>
<!--                        <ul class="l-drop-menu">-->
<!--                            <li class="l-drop-menu__item_size">-->
<!--                                <a href="#" class="c-size-select__item-link" onclick="return false">XXL</a>-->
<!--                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_size">-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">XL</a>-->
<!--                                    </li>-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">L</a>-->
<!--                                    </li>-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">M</a>-->
<!--                                    </li>-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">s</a>-->
<!--                                    </li>-->
<!--                                    <li class="l-drop-menu__sub-menu-item">-->
<!--                                        <a href="#" class="c-size-select__sub-menu-item-link" onclick="return false">xs</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                        </ul>-->
                    </div>
                    <div class="c-quantity-select">
                        <input class="c-quantity-select__input" name="quantity" type="number" value="1" step="1">
                    </div>
                    <input type="submit" class="button button_product-choice-button" value="add to cart">
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