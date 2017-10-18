'use strict'
var num = 4;
function loadProducts ()
{
    $.ajax({
        url: "action.php",
        type: "GET",
        data: {"num": num},
        cache: false,
        success: function(response){
            if(response == 0){
                alert("Больше продуктов нет");
            }else{
                $("#prodWrapp").append(response);
                num = num + 4;
            }
        }
    })
}