$(document).ready(function () {
    cargarDatos();
   
    $('#buscadorProducto').submit(function (e){
        //Evito el funcionamiento por defecto del control
        e.preventDefault(); 
        
        var formAction = $('#buscadorProducto').attr('action');
        var formMethod = $('#buscadorProducto').attr('method'); 
        var formInfo = $('#buscadorProducto').serialize();

        $.ajax({
            url:formAction,
            type:formMethod,
            data: formInfo,
            success: function (datos){
                $('#productosList').html(datos);
            }
        });
    
    });

    $('#quitarFiltro').on( "click", function(){
        $('#filtro').val('')
        cargarDatos();
    });

    $('#formLogin').submit(function (e){
        //Evito el funcionamiento por defecto del control
        e.preventDefault(); 
        
        var formAction = $('#formLogin').attr('action');
        var formMethod = $('#formLogin').attr('method'); 
        var formInfo = $('#formLogin').serialize();

        $.ajax({
            url:formAction,
            type:formMethod,
            data: formInfo,
            success: function (datos){
                $('#Mensajes').html(datos);
                $('#Mensajes').css("display", "block");
            }
        });
    
    });

    $('#formRegistro').submit(function (e){
        //Evito el funcionamiento por defecto del control
        e.preventDefault(); 
        
        var formAction = $('#formRegistro').attr('action');
        var formMethod = $('#formRegistro').attr('method'); 
        var formInfo = $('#formRegistro').serialize();

        $.ajax({
            url:formAction,
            type:formMethod,
            data: formInfo,
            success: function (datos){
                $('#Mensajes').html(datos);
                $('#Mensajes').css("display", "block");
            }
        });
    
    });

});

function cargarDatos(){
    
    $.ajax({
        url:'controladores/ClienteControlador.php?operacion=listar', 
        type: 'GET', 
        success: function (data){  
            $('#productosList').html(data);
        }

    });

}
