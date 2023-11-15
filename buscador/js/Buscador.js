
//Buscar registro en tiempo real
$(buscar_registros());
function buscar_registros(inputbuscador){
    $.ajax({
        url: 'tabla.php',
        type: 'POST',
        dataType: 'Html',
        data: {inputbuscador: inputbuscador},
    })
    .done(function(respuesta){
        $("#mostrar_registros").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}
$(document).on('keyup','#buscar_registros',function(){
    var valor = $(this).val();
    if(valor != ""){
        buscar_registros(valor);
    }else{
        buscar_registros();
    }
});
    