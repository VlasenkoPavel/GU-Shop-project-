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
    var checkoutLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    var goToCartLi = $('<li />', {
        class: "cart-sub-menu__item cart-sub-menu__item_button"
    });
    var checkoutLink = $('<a />', {
        href: "Сheckout.html",
        class: "button button_sub-menu-cart",
        text: "checkout"
    });
    var goToCartLink = $('<a />', {
        href: "http://localhost/index.php/Order/ShowCartPage",
        class: "button button_sub-menu-cart",
        text: "go to cart"
    });

    goToCartLink.appendTo(goToCartLi);
    checkoutLink.appendTo(checkoutLi);
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
        src: "http://localhost/content/img/img_products/" + product.id + '/' + product.id + '_1.jpg',
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

    var buttonRemove = $('<div />', {
        class: "cart-product__delete-from-cart",
        name: "removeProdButton",
        'data-prod': product.id + ',' + product.color + ',' + product.size
    });

    var iconRemove = $('<i />', {
        class: "fa fa-times-circle fa",
        'aria-hidden': "true"
    });

    iconRemove.appendTo(buttonRemove);
    productName.appendTo(productInnerDiv);
    productQuantityPrice .appendTo(productInnerDiv);
    productImg.appendTo(productDiv);
    productInnerDiv.appendTo(productDiv);
    buttonRemove.appendTo(productDiv);
    productDiv.appendTo(productLi);

    var cart = $('#cart');
    productLi.prependTo(cart);
};

Cart.prototype.renderProdInTable = function (product) {

    var productTr = $('<tr />', {
        class: "cart-table-row-product",
        id: 'prod_' + product.id
    });
    var imgCell = $('<td />', {
        class: "cart-table-row-product__img-cell"
    });
    var image = $('<Img />', {
        src: "http://localhost/content/img/img_products/" + product.id + '/' + product.id + '_1.jpg',
        class: "cart-table-row-product__img"
    });
    var nameCell = $('<td />', {
        class: "cart-table-row-product__product-name-cell"
    });
    var name = $('<p />', {
        class: "cart-table-row-product__product-name",
        text: product.name
    });
    var colorWrapper = $('<p />', {
        text: 'Color: '
    });
    var sizeWrapper = $('<p />', {
        text: 'Size: '
    });
    var color = $('<b />', {
        text: product.color
    });
    var size = $('<b />', {
        text: product.size
    });
    var priceCell = $('<td />', {
        class: "cart-table-row-product__price-cell",
        text: '$ ' + product.price
    });
    var quantitysCell = $('<td />', {
        class: "cart-table-row-product__quantitys-cell",
        text: product.quantity
    });
    var shippingCell = $('<td />', {
        class: "cart-table-row-product__shipping-cell",
        text: 'FREE'
    });
    var subtotalCell = $('<td />', {
        class: "cart-table-row-product__shipping-cell",
        text: '$ ' + (product.price * product.quantity)
    });
    var actionCell = $('<td />', {
        class: "cart-table-row-product__action-cell"
    });
    var removeButton = $('<div />', {
        class: "cart-table-row-product__remove-button",
        name: "removeProdButton",
        'data-prod': product.id + ',' + product.color + ',' + product.size
    });
    var iconRemove = $('<i />', {
        class: "fa fa-times-circle fa",
        'aria-hidden': "true"
    });

    iconRemove.appendTo(removeButton);
    removeButton.appendTo(actionCell);
    size.appendTo(sizeWrapper);
    color.appendTo(colorWrapper);

    name.appendTo(nameCell);
    colorWrapper.appendTo(nameCell);
    sizeWrapper.appendTo(nameCell);
    image.appendTo(imgCell);

    imgCell.appendTo(productTr);
    nameCell.appendTo(productTr);
    priceCell.appendTo(productTr);
    quantitysCell.appendTo(productTr);
    shippingCell.appendTo(productTr);
    subtotalCell.appendTo(productTr);
    actionCell.appendTo(productTr);

    var cartTable = $('#cartTable');
    productTr.appendTo(cartTable);
};

Cart.prototype.renderCartTable = function () {
    var self = this;

    this.products.forEach(function(product) {
        self.renderProdInTable (product);
    });
    $('#cartFormSubTotal').text( '$ ' + this.totalCost );
    $('#cartFormGrandTotal').text( '$ ' + this.totalCost );
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

    this.products.forEach(function(product) {
        self.renderProduct(product);
    });

    if ( $('#cartTable').length ) {
        var products = $("[id^=prod]");
        products.remove();
        self.renderCartTable();
    };

    this.bindRemoveEvents();
};

Cart.prototype.bindRemoveEvents = function() {
    var self = this;

    $("[name=removeProdButton]").on('click', function(){
        var srtData = this.getAttribute('data-prod');
        var arrData = srtData.split(',');
        self.refresh();
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
                Cart.prototype.refresh();
            },
            error: function (error) {
                console.log('Ошибка', error.status, error.statusText);
            }
        });
    });
    $("#clearCartButton").on('click', function(){
        $.get({
            url: 'http://localhost/index.php/Order/RemoveAllProdFromOpenOrd',
            context: this,
            async: false,
            dataType: 'json',
            data: {
                'removeAllproducts': true
            },
            success: function (data) {
                self.refresh();
            },
            error: function (error) {
                console.log('Ошибка', error.status, error.statusText);
            }
        });
    });
};
