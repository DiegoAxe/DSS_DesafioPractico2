<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
    if ($_SESSION['TipoUsuario'] == "Cliente") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexCliente.php'><button type='button'> Regresar a la tienda </button></a>";
    }else if ($_SESSION['TipoUsuario'] == "Empleado") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexProductos.php'><button type='button'> Regresar a la lista de Productos </button></a>";
    }else{
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Interfaz de Administrador</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/Admin.css">
</head>

<body>
    <!-- header -->
    <header id="AdminHeader">
        Tienda Online de Textil Export - Administrador
    </header>

    <!-- Navegador -->
    <nav id="AdminNav">
        <a class="logo"> <span> Textil Export. </span> </a>
        <a class="menu" href="IndexProductos.php"> <span> Productos </span> </a>
        <a class="menu" href="IndexCategorias.php"> <span> Categorias </span> </a>
        <a class="menu" href="IndexUsuarios.php"> <span> Usuarios </span> </a>
        <a class="menu" href="IndexVentas.php"> <span> Ventas </span> </a>
    </nav>

    <div class="container">
        <h1 class="page-header text-center">Clientes Registrados</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2" id="MainDiv">
                <div style="display:none" class='divErroresMain' id="Mensaje">

                </div>

                <table id="ProductTable" class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead id="tableTH">
                        <th>Id del Cliente</th>
                        <th>Nombre de Cliente</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <!-- Aqui se muestra el listado de clientes -->
                    </tbody>
                </table>

            </div>
        </div>

        <br> <br>

        <h1 class="page-header text-center">Empleados Registrados</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2" id="MainDiv">
                <div style="display:none" class='divErroresMain' id="Mensaje2">

                </div>
                
                <a href="#addnew" class="btn btn-primary" data-toggle="modal">
                    <span class="glyphicon glyphicon-plus"></span> Registrar Empleado</a>
                

                <table id="EmpleadoTable" class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead id="tableTH">
                        <th>Id del Empleado</th>
                        <th>Nombre del Empleado</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Nivel de empleado</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <!-- Aqui se muestra el listado de empleados -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <?php include('ventanasModals/usuarios/modal_Registrar.php'); ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/AjaxUsuarios.js"></script>

    <!-- footer -->
    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <p class="display-5 mb-3">Textil Export</p>
            <small class="text-white-50"> &copy; Copyright by Diego Ariel Martinez Lemus & Cristian Alexis Lopez Tamayo. All rights reserved </small>
            <br><br> <a href="controladores/UsuarioControlador.php?operacion=logout">
            <button id="btnLogout" type="button" class="btn btn-danger btn-lg">Cerrar Sesión</button>  </a>
        </div>
    </footer>

</body>

</html>
<?php
    }
}
?>