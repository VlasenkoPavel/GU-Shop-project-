<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Shoping chart</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <?php require_once VIEWS_DIR . '__header.php'; ?>
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
        <div class="content-wrapper">
            <table class="cart-table content-wrapper__cart-table">
                <tr class="cart-table-row-header">
                    <th class="cart-table-row-header__product-details-cell">Product Details</th>
                    <th class="cart-table-row-header__product-info"></th>
                    <th class="cart-table-row-header__price-cell">unite Price</th>
                    <th class="cart-table-row-header__quantitys-cell">Quantity</th>
                    <th class="cart-table-row-header__shipping-cell">shipping</th>
                    <th class="cart-table-row-header__subtotal-cell">subtotal</th>
                    <th class="cart-table-row-header__action-cell">ACTION</th>
                </tr>
                <tr class="cart-table-row-product">
                    <td class="cart-table-row-product__img-cell"><img class="cart-table-row-product__img" class="cart-table-row-product__img" src="img/prod_img/Cart_prod_1_img.jpg" alt=""></td>
                    <td class="cart-table-row-product__product-name-cell">
                        <p class="cart-table-row-product__product-name">Mango  People  T-shirt</p>
                        Color: <b>Red</b><br>
                        Size: <b>Xll</b></br>
                    </td>
                    <td class="cart-table-row-product__price-cell">$150</td>
                    <td class="cart-table-row-product__quantitys-cell">2</td>
                    <td class="cart-table-row-product__shipping-cell">free</td>
                    <td class="cart-table-row-product__subtotal-cell">$300</td>
                    <td class="cart-table-row-product__action-cell">
                        <i class="fa fa-times-circle fa" aria-hidden="true"></i>
                    </td>
                </tr>
                <tr class="cart-table-row-product">
                    <td class="cart-table-row-product__img-cell"><img class="cart-table-row-product__img" src="img/prod_img/Cart_prod_2_img.jpg" alt=""></td>
                    <td class="cart-table-row-product__product-name-cell">
                        <p class="cart-table-row-product__product-name">Mango  People  T-shirt</p>
                        Color: <b>Red</b><br>
                        Size: <b>Xll</b></br>
                    </td>
                    <td class="cart-table-row-product__price-cell">$150</td>
                    <td class="cart-table-row-product__quantitys-cell">2</td>
                    <td class="cart-table-row-product__shipping-cell">free</td>
                    <td class="cart-table-row-product__subtotal-cell">$300</td>
                    <td class="cart-table-row-product__action-cell">
                        <i class="fa fa-times-circle fa" aria-hidden="true"></i>
                    </td>
                </tr>
                <tr class="cart-table-row-product">
                    <td class="cart-table-row-product__img-cell"><img class="cart-table-row-product__img" src="img/prod_img/Cart_prod_3_img.jpg" alt=""></td>
                    <td class="cart-table-row-product__product-name-cell">
                        <p class="cart-table-row-product__product-name">Mango  People  T-shirt</p>
                        Color: <b>Red</b><br>
                        Size: <b>Xll</b></br>
                    </td>
                    <td class="cart-table-row-product__price-cell">$150</td>
                    <td class="cart-table-row-product__quantitys-cell">2</td>
                    <td class="cart-table-row-product__shipping-cell">free</td>
                    <td class="cart-table-row-product__subtotal-cell">$300</td>
                    <td class="cart-table-row-product__action-cell">
                        <i class="fa fa-times-circle fa" aria-hidden="true"></i>
                    </td>
                </tr>
            </table>
            <div class="cart-table__buttons-wrapper">
                <a href="#" class="button button_sub-menu-cart" role="button" onclick="return false">CLEAR SHOPPING CART</a>
                <a href="Product.html" class="button button_sub-menu-cart" role="button">CONTINUE sHOPPING</a>
            </div>
            <form action="" class="shipping-form content-wrapper__shipping-form">
                <div class="shipping-form__fieldset shipping-form__fieldset_shipping-adress">
                    <h3 class="shipping-form__fieldset-heading">Shipping Adress</h3>
                    <input class="input-fild input-fild_shipping-form" type="text" name="">
                    <input class="input-fild input-fild_shipping-form" type="text" name="">
                    <input class="input-fild input-fild_shipping-form" type="number" name="">
                    <a href="#" class="button button_sub-menu-cart button_sub-menu-cart-small" role="button">get a quote</a>
                </div>
                <div class="shipping-form__fieldset shipping-form__fieldset_coupon-discount">
                    <h3 class="shipping-form__fieldset-heading">coupon  discount</h3>
                    <label class="shipping-form__input-comment" for="coupon-code">Enter your coupon code if you have one</label>
                    <input class="input-fild input-fild_shipping-form" type="text" name="" id="coupon-code">
                    <a href="#" class="button button_sub-menu-cart button_sub-menu-cart-small" role="button">Apply coupon</a>
                </div>
                <div class="shipping-form__fieldset shipping-form__fieldset_grand-total">
                    <div class="shipping-form__sub-total">
                        <span>sub-total</span>
                        <span class="shipping-form__sub-total-prise">$900</span>
                    </div>
                    <div class="shipping-form__grand-total">
                        <span>grand-total</span>
                        <span class="shipping-form__grand-total-prise">$900</span>
                    </div>
                    <a href="Сheckout.html" class="button button_red button_proceed-to-checkout">proceed to checkout</a>
                </div>
            </form>
        </div>
    </main>
    <?php require_once VIEWS_DIR . '__footer.php'; ?>
</div>
</body>
</html>