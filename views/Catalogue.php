<!DOCTYPE html>
<html lang="ru">
<head>
    <?php require_once VIEWS_DIR . '__head.php'; ?>
    <title>Catalogue</title>
    <link rel="stylesheet" href="<?= CSS_CATALOG . 'ion.rangeSlider.css'?>" />
    <link rel="stylesheet" href="<?= CSS_CATALOG . 'ion.rangeSlider.skinFlat.css'?>"/>
    <script src="<?= JS_CATALOG . 'ion.rangeSlider.js'?>"></script>
    <script src="<?= JS_CATALOG . 'paging.js'?>"></script>
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
    <main class="main">
        <?php require_once VIEWS_DIR . '__page-heading.php'; ?>
        <div class="content-wrapper">
            <section class="products-search-section content-wrapper__products-search-section">
                <aside class="products-sidebar">
                    <div class="c-products-sidebar-drop-menu">
                        <ul class="l-drop-menu">
                            <li class="l-drop-menu__item_category">
                                <a href="#" class="c-products-sidebar-drop-menu__item-link" onclick="return false">category</a>
                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_pushing">
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Accessories</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Bags</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Denim Hoodies & Sweatshirts</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Jackets & Coats</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Pants</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Polos</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Shirts</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Shoes</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Shorts</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Sweaters & Knits</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">T-Shirts</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Tanks</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="c-products-sidebar-drop-menu">
                        <ul class="l-drop-menu">
                            <li class="l-drop-menu__item_brend">
                                <a href="#" class="c-products-sidebar-drop-menu__item-link" onclick="return false">BRAND</a>
                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_pushing">
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Accessories</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Bags</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Denim Hoodies & Sweatshirts</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Jackets & Coats</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">Pants</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="c-products-sidebar-drop-menu">
                        <ul class="l-drop-menu">
                            <li class="l-drop-menu__item_designer">
                                <a href="#" class="c-products-sidebar-drop-menu__item-link" onclick="return false">designer</a>
                                <ul class="l-drop-menu__sub-menu l-drop-menu__sub-menu_pushing">
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">designer name</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">designer name</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">designer name</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">designer name</a>
                                    </li>
                                    <li class="l-drop-menu__sub-menu-item">
                                        <a href="#" class="c-products-sidebar-drop-menu__sub-menu-item-link" onclick="return false">designer name</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <div>
                    <form action="#" class="products-search-form">
                        <div class="products-search-form__trending-now-menu">
                            <h3 class="products-search-form__fieldset-heading">trending now</h3>
                            <div class="trending-now-menu">
                                <a href="#" class="trending-now-menu__item" onclick="return false">Bohemian</a>
                                <a href="#" class="trending-now-menu__item" onclick="return false">Floral</a>
                                <a href="#" class="trending-now-menu__item" onclick="return false">Lace</a>
                                <a href="#" class="trending-now-menu__item" onclick="return false">Floral</a>
                                <a href="#" class="trending-now-menu__item" onclick="return false">Lace</a>
                                <a href="#" class="trending-now-menu__item" onclick="return false">Bohemian</a>
                            </div>
                        </div>
                        <div class="products-search-form__size-checkbox-fild">
                            <h3 class="products-search-form__fieldset-heading">size</h3>
                            <div>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox" checked/>
                                    XXS
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    XS
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    S
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    m
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    l
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    xl
                                </label>
                                <label class="products-search-form__size-checkbox-label">
                                    <input name="check-size" type="checkbox" class="products-search-form__size-checkbox"/>
                                    xxl
                                </label>
                            </div>
                        </div>
                        <div class="products-search-form__price-range">
                            <h3 class="products-search-form__fieldset-heading">price</h3>
                            <input type="text" id="range" value="" name="range"/>
                        </div>
                        <div class="products-search-form__sort-menus"></div>
                    </form>
                    <div class="content"></div>
                </div>
            </section>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
<script src="<?= JS_CATALOG . 'catalogue.js'?>"></script>
</html>