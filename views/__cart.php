<table class="cart-table content-wrapper__cart-table" id="cartTable">
    <tr class="cart-table-row-header">
        <th class="cart-table-row-header__product-details-cell">Product Details</th>
        <th class="cart-table-row-header__product-info"></th>
        <th class="cart-table-row-header__price-cell">unite Price</th>
        <th class="cart-table-row-header__quantitys-cell">Quantity</th>
        <th class="cart-table-row-header__shipping-cell">shipping</th>
        <th class="cart-table-row-header__subtotal-cell">subtotal</th>
        <th class="cart-table-row-header__action-cell">ACTION</th>
    </tr>
</table>
<div class="cart-table__buttons-wrapper">
    <a href="#" id="clearCartButton" class="button button_sub-menu-cart" role="button">CLEAR SHOPPING CART</a>
<!--    <a href="Product.html" class="button button_sub-menu-cart" role="button">CONTINUE SHOPPING</a>-->
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
            <span id="cartFormSubTotal" class="shipping-form__sub-total-prise">$ 0</span>
        </div>
        <div class="shipping-form__grand-total">
            <span>grand-total</span>
            <span id="cartFormGrandTotal" class="shipping-form__grand-total-prise">$ 0</span>
        </div>
        <a href="Сheckout.html" class="button button_red button_proceed-to-checkout">proceed to checkout</a>
    </div>
</form>