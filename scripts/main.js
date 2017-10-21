$(document).ready(function () {
    let cart = new Cart('cart');
    cart.render('#cart_wrapper');

    // $('.buyme').on('click', function () {
    //     //var idProduct = parseInt($(this).attr('id').split('_')[1]);
    //     var idProduct = parseInt($(this).attr('data-id'));
    //     var quantity = 1;
    //     var price = parseInt($(this).parent().find('.product-price').text());
    //
    //     basket.add(idProduct, quantity, price);
    // });
});
