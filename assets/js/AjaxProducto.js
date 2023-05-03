$(document).ready(function () {
    cargarProductos();
    cargarCategorias();
    
    $('#formRegistro').submit(function (e){
        //Evito el funcionamiento por defecto del control
        e.preventDefault();
        
        var formAction = $('#formRegistro').attr('action');
        var formMethod = $('#formRegistro').attr('method'); 
        //var formInfo = $('#formRegistro').serialize();
    
        $.ajax({
            url:formAction,
            type:formMethod,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (datos){
                $('#ProductTable > tbody').html(datos);
                $('#Mensaje').css('display', 'block');
                $('#Mensaje').html('Ingreso de Producto Exitoso');
                cargarProductos();
                $('#addnew').modal('hide');
            }
        });
    
    });

    

});

function cargarProductos(){
    $.ajax({
        url:'controladores/ProductoControlador.php?operacion=listar', 
        type: 'GET', 
        success: function (data){  
            $('#ProductTable > tbody').html(data);
            borrarDatos();
            editarDatos();
        }

    });
}

function cargarCategorias(){
    
    $.ajax({
        url:'controladores/ProductoControlador.php?operacion=categorias', 
        type: 'GET', 
        success: function (data){  
            $('#CategoriaRegistro').html(data);
        }

    });
}

function borrarDatos(){
    $('.btnBorrar').click(function (){
        $(".modal").modal('hide');
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        var idProducto = $(this).val();  
        
        $.ajax({
            url: 'controladores/ProductoControlador.php?operacion=borrar&codigo='+idProducto,
            type: 'GET',
            success: function (datos){
                $('#ProductTable > tbody').html(datos);
                $('#Mensaje').css("display", "block");
                $('#Mensaje').html("Borrado de Producto Exitoso");
                cargarProductos();
                
            }
        
        });  

    });
}

function editarDatos(){
    $('.formEditar').submit(function (e){
        //Evito el funcionamiento por defecto del control
        e.preventDefault();

        $(".modal").modal('hide');
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        
        var formAction = $(this).attr('action');
        var formMethod = $(this).attr('method'); 
    
        $.ajax({
            url:formAction,
            type:formMethod,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function (datos){
                $('#ProductTable > tbody').html(datos);
                $('#Mensaje').css("display", "block");
                $('#Mensaje').html("Edicion de Producto Exitoso");
                cargarProductos();
                
            }
        });
    
    });
}