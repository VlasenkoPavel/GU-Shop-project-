function Cart() {
    
    // this.id = id;
    this.htmlCode = '';

    this.countProducts = 0; //Количество товаров в корзине
    this.totalCost = 0; //Общая стоимость товаров
    this.products = []; //Товары, которые находятся в корзине

    //Получаем товары, которые уже добавлены в корзину
    // this.getCart();
}

Cart.prototype.renderCart = function (root) {
    var cart = $('<ul />', {
        id: "cart",
        class: "drop-menu-cart__sub-menu cart-sub-menu"
    });
    // var totalPriceLi = $('<li />', {
    //     class: "cart-sub-menu__item cart-sub-menu__item_total-price"
    // });
    var checkoutLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    var goToCartLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    // var totalP = $('<p />', {
    //     class: "cart-sub-menu__total",
    //     text: 'total'
    // });
    // var priceP = $('<p />', {
    //     class: "cart-sub-menu__price",
    //     text: this.totalCost
    // });
    var checkoutLink = $('<a />', {
        href: "Сheckout.html",
        class: "button button_sub-menu-cart",
        text: "checkout"
    });
    var goToCartLink = $('<a />', {
        href: "Shopping_cart.html",
        class: "button button_sub-menu-cart",
        text: "go to cart"
    });

    goToCartLink.appendTo(goToCartLi);
    checkoutLink.appendTo(checkoutLi);
    // totalP.appendTo(totalPriceLi );
    // priceP.appendTo(totalPriceLi );

    // totalPriceLi.appendTo(cart);
    goToCartLi.appendTo(cart);
    checkoutLi.appendTo(cart);

    cart.appendTo(root);
};

Cart.prototype.getData = function () {
    $.get({
        url: 'http://localhost/index.php/Order/GetOpenOrder',
        context: this,
        async: false,
        dataType: 'json',
        success: function (data) {
            this.totalCost = + data.totalCost;
            this.products = data.products;
            this.countProducts = this.products.reduce(function (sum, curr) {
                return sum + +curr.quantity;
            }, 0);
        },
        error: function (error) {
            console.log('Ошибка', error.status, error.statusText);
        }
    });
};

Cart.prototype.renderProduct = function (product) {

    var productLi = $('<li />', {
        class: "cart-sub-menu__item"
    });
    var productDiv = $('<div />', {
        class: "cart-sub-menu__item-product cart-product"
    });
    var productImg = $('<Img />', {
        src: "http://localhost/content/img/img_products/" + product.id + '.jpg',
        class: "cart-product__product-img"
    });
    var productInnerDiv = $('<div />', {
        class: "cart-product__inner-wrapper"
    });
    var productName = $('<div />', {
        class: "art-product__product-name",
        text: product.name
    });
    var productQuantityPrice = $('<div />', {
        class: "cart-product__quantity-x-price",
        text: product.quantity + ' x ' + product.price
    });

    var buttonRemove = $('<a />', {
        class: "cart-product__delete-from-cart",
        name: product.id + ',' + product.color + ',' + product.size
    });

    var iconRemove = $('<i />', {
        class: "fa fa-times-circle fa"
        // aria-hidden: "true"
    });

    iconRemove.appendTo(buttonRemove);
    productName.appendTo(productInnerDiv);
    productQuantityPrice .appendTo(productInnerDiv);
    productImg.appendTo(productDiv);
    productInnerDiv.appendTo(productDiv);
    buttonRemove.appendTo(productDiv);
    productDiv.appendTo(productLi);

    // var totalPrice = $('[class*=cart-sub-menu__item_total-price]')[0];
    // console.log(totalPrice);
    var cart = $('#cart');
    productLi.prependTo(cart);
    // console.log(cart);
    // productLi.before(totalPrice);
};

Cart.prototype.refresh = function () {
    var self = this;
    var cart = $('#cart');
    cart.remove();
    this.getData();
    this.renderCart('#cart_wrapper');
    cart = $('#cart');

    var count = $('.drop-menu-cart__count');
    count.text(this.countProducts);
    // console.log (count);

    var totalPriceLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_total-price"
    });
    var totalP = $('<p />', {
        class: "cart-sub-menu__total",
        text: 'total'
    });
    var priceP = $('<p />', {
        class: "cart-sub-menu__price",
        text: this.totalCost
    });

    totalP.appendTo(totalPriceLi );
    priceP.appendTo(totalPriceLi );
    totalPriceLi.prependTo(cart);

    // console.log(this.products);
    this.products.forEach(function(product) {
        self.renderProduct(product);
    });
    this.bindRemoveEvents();
};

Cart.prototype.bindRemoveEvents = function() {
    $(".cart-product__delete-from-cart").bind('click', function(elem){
        var srtData = this.name;
        var arrData = srtData.split(',');

        $.get({
            url: 'http://localhost/index.php/Order/RemoveProdFromOpenOrd',
            context: this,
            async: false,
            dataType: 'json',
            data: {
                'product_id': arrData[0],
                'color': arrData[1],
                'size':arrData[2]
            },
            success: function (data) {
                console.log(data);
                Cart.prototype.refresh();
                // cart.refresh();
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
    });
};
