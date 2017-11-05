$(document).ready(function () {
    let cart = new Cart();
    cart.refresh();

    // $('[class*=button_product-choice-button]').on('click', function () {
    //     console.log('by');
    //     return false;
    // });

    $(".product-choice__form").submit(function() {

        var formData =[];

        formData = $(this).serializeArray();

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
                cart.refresh();
            },
            error: function (error) {
                console.log('Ошибка', error.status, error.statusText);
            }
        });

        return false;

        });

});
