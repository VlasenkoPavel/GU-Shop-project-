$(document).ready(function () {
    let cart = new Cart();
    cart.renderCart( '#cart_wrapper' );
    cart.refresh();
});
