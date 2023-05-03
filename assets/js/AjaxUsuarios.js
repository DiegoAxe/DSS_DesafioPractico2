$(document).ready(function () {
    cargarClientes();
    cargarEmpleados();

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
                $('#Mensaje2').css('display', 'block');
                $('#Mensaje2').html('Ingreso de Usuario Exitoso');
                cargarEmpleados();
                $('#addnew').modal('hide');
            }
        });
    
    });

});

function cargarEmpleados(){
    $.ajax({
        url:'controladores/UsuarioControlador.php?operacion=empleados', 
        type: 'GET', 
        success: function (data){  
            $('#EmpleadoTable > tbody').html(data);
            editarDatos();
            borrarDatos();
            cargarClientes();
        }

    });
}

function cargarClientes(){
    $.ajax({
        url:'controladores/UsuarioControlador.php?operacion=clientes', 
        type: 'GET', 
        success: function (data){  
            $('#ProductTable > tbody').html(data);
            habilitarUsers();
        }

    });
}

function habilitarUsers(){
    $('.btnCambio').click(function (){
        $(".modal").modal('hide');
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        var idUsuario = $(this).val();  
        
        $.ajax({
            url: 'controladores/UsuarioControlador.php?operacion=cambiar&codigo='+idUsuario,
            type: 'GET',
            success: function (datos){
                $('#ProductTable > tbody').html(datos);
                $('#Mensaje').css("display", "block");
                $('#Mensaje').html("Cambio de Estado Existoso");
                cargarClientes();
                
            }
        
        });  

    });
}


function borrarDatos(){
    $('.btnBorrar').click(function (){
        $(".modal").modal('hide');
        $(".modal-backdrop").remove();
        $('body').removeClass('modal-open');
        var idUsuario = $(this).val();  
        
        $.ajax({
            url: 'controladores/UsuarioControlador.php?operacion=borrar&codigo='+idUsuario,
            type: 'GET',
            success: function (datos){
                $('#EmpleadoTable > tbody').html(datos);
                $('#Mensaje2').css("display", "block");
                $('#Mensaje2').html("Borrado de Empleado Exitoso");
                cargarEmpleados();
                
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
                $('#EmpleadoTable > tbody').html(datos);
                $('#Mensaje2').css("display", "block");
                $('#Mensaje2').html("Edicion de Empleado Exitoso");
                cargarEmpleados();
                
            }
        });
    
    });
}
