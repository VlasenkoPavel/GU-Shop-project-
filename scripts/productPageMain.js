$(document).ready(function () {
    let cart = new Cart();
    cart.renderCart('#cart_wrapper');
    cart.refresh();

    // $('[class*=button_product-choice-button]').on('click', function () {
    //     console.log('by');
    //     return false;
    // });

    $(".product-choice__form").submit(function() {

        var formData =[];

        formData = $(this).serializeArray();
        console.log (formData);

        $.get({
            url: 'http://localhost/index.php/Order/AddProdToOpenOrd',
            context: this,
            async: false,
            dataType: 'json',
            data: {
                'product_id': formData[0].value,
                'color': formData[1].value,
                'size': formData[2].value,
                'quantity': formData[3].value
            },
            success: function (data) {
                console.log(data);
                // this.totalCost = + data.totalCost;
                // this.products = data.products;
                // this.countProducts = this.products.reduce(function (sum, curr) {
                //     return sum + +curr.quantity;
                // }, 0);
            },
            error: function (error) {
                console.log('Ошибка', error.status, error.statusText);
            }
        });

        return false;

        // $.ajax({
        //     url: "index.php",
        //     type: "POST",
        //     data: {
        //         'price': formData[0].value,
        //         'name': formData[1].value,
        //         'e-mail': formData[2].value,
        //         'phone': formData[3].value
        //     },
        //     datatype: "json",
        //     cache: false,
        //     success: function(response)
        //     {
        //         console.log (response);
        //         controller.closeForm();
        //         controller.callElem('thanks-order__wrapper');
        //         setTimeout(function () {
        //             controller.closeForm();
        //         }, 2500);
        //     },
        //     error: function (error) {
        //         controller.closeForm();
        //         controller.callElem('error__wrapper');
        //     }
        });

    // $('.buyme').on('click', function () {
    //     //var idProduct = parseInt($(this).attr('id').split('_')[1]);
    //     var idProduct = parseInt($(this).attr('data-id'));
    //     var quantity = 1;
    //     var price = parseInt($(this).parent().find('.product-price').text());
    //
    //     basket.add(idProduct, quantity, price);
    // });
});
