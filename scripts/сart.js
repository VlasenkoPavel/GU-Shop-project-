function Cart(id) {
    
    this.id = id;
    this.htmlCode = '';

    this.countGoods = 0; //Количество товаров в корзине
    this.amount = 0; //Общая стоимость товаров
    this.cartItems = []; //Товары, которые находятся в корзине

    //Получаем товары, которые уже добавлены в корзину
    // this.getCart();
}

Cart.prototype.render = function (root) {
    console.log("render2");
    var cart = $('<ul />', {
        class: "drop-menu-cart__sub-menu cart-sub-menu"
    });
    var totalPriceLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_total-price"
    });
    var checkoutLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    var goToCartLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    var totalP = $('<p />', {
        class: "cart-sub-menu__total",
        text: 'total'
    });
    var priceP = $('<p />', {
        class: "cart-sub-menu__price",
        text: this.amount
    });
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
    totalP.appendTo(totalPriceLi );
    priceP.appendTo(totalPriceLi );

    totalPriceLi.appendTo(cart);
    goToCartLink.appendTo(cart);
    checkoutLi.appendTo(cart);

    cart.appendTo(root);
    console.log(cart);
};

Cart.prototype.getCart = function () {
    var appendId = '#' + this.id + '_items';
    //var self = this;
    $.get({
        url: 'http://localhost/index.php/Order/GetOpenOrder',
        context: this,
        dataType: 'json',

        success: function (data) {
            console.log(data);
            // var cartData = $('<div />', {
            //     id: 'cart_data'
            // });
            // this.countGoods = data.cart.length; //Обновляем общее количество товаров
            // this.amount = data.amount; //Обновляем общую стоимость товаров
            //
            // cartData.appendTo(appendId);
            //
            // //Перекладываем все товары в cartItems
            // for(var item in data.cart)
            // {
            //     this.cartItems.push(data.cart[item]);
            // }
            //
            // this.refresh(); //Обновляем корзину
        },
        error: function (error) {
            console.log('Ошибка', error.status, error.statusText);
        }
    });
};

Cart.prototype.add = function (idProduct, quantity, price) {
    var cartItem = {
        "id_product": idProduct,
        "price": price
    };

    //Добавляем общее количество
    this.countGoods += quantity;

    this.amount += price;
    this.cartItems.push(cartItem);
    this.refresh(); //Обновляем корзину
};

Cart.prototype.refresh = function () {
    var cartDataDiv = $('#Cart_data');
    cartDataDiv.empty();
    cartDataDiv.append('<p>Всего товаров: ' + this.countGoods + '</p>');
    cartDataDiv.append('<p>Сумма: ' + this.amount + '</p>');
};
