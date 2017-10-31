$(document).ready(function () {

    $( "#tabs" ).tabs();

    $( "#prodIdByName" ).submit( function(){

        var arrData = $( this ).serializeArray();
        var prodName = arrData[ 0 ][ 'value' ];

        $.get({
            url: 'http://localhost/index.php/Admin/GetProdIdByName',
            context: this,
            async: false,
            dataType: 'json',
            data: {
                'product_name': prodName
            },
            success: function (data) {
                var elem = $( ".admin-panel__info","#prodIdByName" );
                elem.text( 'product id: ' + data );
            },
            error: function ( error ) {
                console.log( 'Ошибка', error.status, error.statusText );
            }
        });

        return false;
    });

    // var  fileImg;
    //
    // $('input[type=file]').change(function(){
    //     fileImg = this.files;
    // });
    //
    // $( "#addProdImg" ).submit( function(){
    //
    //     var arrData = new FormData();
    //
    //     $.post({
    //         url: 'http://localhost/index.php/Admin/AddProdImg',
    //         context: this,
    //         async: false,
    //         dataType: 'json',
    //         processData: false, // Не обрабатываем файлы (Don't process the files)
    //         contentType: false, // Так jQuery скажет серверу что это строковой запрос
    //     //     data: {
    //     //         'product_id': product_id
    //     //     },
    //     //     success: function (data) {
    //     //         console.log(data);
    //     //     },
    //     //     error: function ( error ) {
    //     //         console.log( 'Ошибка', error.status, error.statusText );
    //     //     }
    //     // });
    //     return false;
    // });

});
