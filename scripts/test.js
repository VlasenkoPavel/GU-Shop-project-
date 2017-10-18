// const VISIBLE_PAGE_NUMBER = 4;
// const UNITS_ON_PAGE = 3;

window.onload = $(function () {
    $("#range").ionRangeSlider({
        keyboard: true,
        min: 0,
        max: 5000,
        from: 1000,
        to: 3000,
        type: 'double',
        step: 100,
        prefix: "$",
        hide_min_max: false,
        hide_from_to: true
    });

});

window.onload = function () {

    let controller = new AjaxProductsController(1);

    controller.renderData ();
    controller.initLinks();
}
