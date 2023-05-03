$(document).ready(function () {
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
                $('#Mensaje').html('Ingreso de Categoria Exitoso');
                cargarCategorias();
                $('#addnew').modal('hide');
            }
        });
    
    });

});

function cargarCategorias(){
    $.ajax({
        url:'controladores/CategoriaControlador.php?operacion=listar', 
        type: 'GET', 
        success: function (data){  
            $('#ProductTable > tbody').html(data);
            borrarDatos();
            editarDatos();
        }

    });
}

function borrarDatos(){
    $('.btnBorrar').click(function (){
        $(".modal").modal('hide');
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        var idCategoria = $(this).val();  
        
        $.ajax({
            url: 'controladores/CategoriaControlador.php?operacion=borrar&codigo='+idCategoria,
            type: 'GET',
            success: function (datos){
                $('#ProductTable > tbody').html(datos);
                $('#Mensaje').css("display", "block");
                $('#Mensaje').html("Borrado de Categoria Exitoso");
                cargarCategorias();
                
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
                $('#Mensaje').html("Edicion de Categoria Exitoso");
                cargarCategorias();
                
            }
        });
    
    });
}