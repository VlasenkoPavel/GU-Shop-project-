'use strict';
class AjaxProductsController
{
    constructor (pageNumber)
    {
        const VISIBLE_PAGE_NUMBER = 4;
        const UNITS_ON_PAGE = 6;

        const getGETparams = () =>
        {
            let  getParams = window
                .location
                .search
                .replace('?','')
                .split('&')
                .reduce(
                    function(p,e){
                        var a = e.split('=');
                        p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
                        return p;
                    },
                    {}
                );

            return getParams;
        };

        let getPagams = getGETparams();

        const renderData = () =>
        {
            $.ajax({
                url: "http://localhost/index.php/Main/AjaxGetProducts",
                type: "POST",
                data: {
                    'type': getPagams.type,
                    'category': getPagams.category,
                    'min': ((pageNumber - 1) * UNITS_ON_PAGE),
                    'limit': UNITS_ON_PAGE
                },
                datatype: "json",
                cache: false,
                success: function(response)
                {
                    // console.log (response);
                    if(!response){
                        console.log ("no response");
                        return false;
                    }

                    let products = JSON.parse(response, true);
                    // console.log(data);

                    let visualiser = new ajaxPageVisualizer (products, UNITS_ON_PAGE, VISIBLE_PAGE_NUMBER);
                    visualiser.render();
                    visualiser.initLinks();
                }
            });
        };

        this.renderData = renderData;
    }
}


class ajaxPageVisualizer
{
    constructor(dataArr, unitsOnPage, visiblePageNumber)
    {
        //сделать if проверки на null
        this.count = dataArr['count'];
        this.dataArr = dataArr['products'];
        this.pageNumber = Math.ceil(this.count / unitsOnPage);
        this.visiblePageNumber = visiblePageNumber;
        console.log(dataArr);
        console.log(this.dataArr);
        // console.log(this.pageNumber);
        // console.log(this.visiblePageNumber);

        const renderPageButton = (num) =>
        {
            let htmlCode = '<a href="#" role="button" class="products-paging__item">' + num + '</a>';

            return  htmlCode;
        };

        const renderData  = (data) =>
        {
            let htmlCode = '';

            data.forEach( function (unit)
            {
                htmlCode += renderUnit(unit);
            });

            return htmlCode;
        };

        const renderPaging = (pageNumber, visiblePageNumber) =>
        {
            let htmlCode ='';

            if (pageNumber > visiblePageNumber) {
                for (let i = 1; i < visiblePageNumber; i++) {
                    htmlCode += renderPageButton(i);
                }

                htmlCode += '<div class="products-paging__inner-item-wrapper">'
                    + '<a href="#" role="button" class="products-paging__sub-wrapper-caller" onclick="return false;">...</a>'
                    + '<div class="products-paging__sub-wrapper">';

                for (let i = visiblePageNumber; i < pageNumber; i++) {
                    htmlCode += renderPageButton(i);
                }

                htmlCode += '</div>'
                    + '</div>'
                    + renderPageButton(pageNumber);

            } else {
                for (let i = 1; i <= pageNumber; i++) {
                    htmlCode += renderPageButton(i);
                }
            }
            return htmlCode;
        };

        const renderUnit = (unit) =>
        {
            let htmlCode = ''
                + '<a href="http://localhost/index.php/main/ShowProductPage?product_id=' + unit.id +  '" class="product-link product-link_in-narrow-wrapper">'
                + '<img src="http://localhost/content/img/img_products/' + unit.id + '/' + unit.id + '_1.jpg" alt="" class="product-link__product-img">'
                + '<p class="product-link__product-name">' + unit.name + '</p>'
                + '<p class="product-link__product-price">' + unit.price + '</p>'
                + '<div class="product-link__product-hover-mask">'
                +   '<div class="product-link__add-to-cart">add to cart</div>'
                + '</div>'
                + '</a>';

            return  htmlCode;
        };

        const initLinks = () =>
        {
            let pageLinkArr = document.getElementsByClassName('products-paging__item');
            for ( let i = 0; i <= pageLinkArr.length - 1; i++ ) {
                let elem = pageLinkArr[ i ];
                elem.addEventListener("click", function ()
                    {
                        event.preventDefault();
                        let num = + elem.innerHTML;
                        let pageCaller = new AjaxProductsController(num);
                        pageCaller.renderData();
                    }
                );
            }
        };

        function render()
        {
            let data = document.getElementsByClassName('products-wrapper products-wrapper_narrow products-search-section__products-wrapper')[0];
            let paging = document.getElementsByClassName('products-paging')[0];

            data.innerHTML = '';
            paging.innerHTML = '';

            let dataHTML = renderData(this.dataArr );
            let pagingHtml = renderPaging(this.pageNumber, this.visiblePageNumber);

            data.innerHTML = dataHTML;
            paging.innerHTML = pagingHtml;
        }

        this.render = render;
        this.initLinks = initLinks;
    }
}
