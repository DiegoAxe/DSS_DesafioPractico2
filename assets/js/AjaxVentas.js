$(document).ready(function () {
    cargarVentas();    

});

function cargarVentas(){
    $.ajax({
        url:'controladores/VentaControlador.php?operacion=listar', 
        type: 'GET', 
        success: function (data){  
            $('#ProductTable > tbody').html(data);
        }

    });
}
