<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
    if ($_SESSION['TipoUsuario'] != "Cliente") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexProductos.php'><button type='button'> Regresar a la lista de Productos </button></a>";
    }else{
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/Admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <title>Textil Export</title>
    </head>

    <body>
        <!--Encabezado -->
        <header class="container-fluid bg-secondary d-flex justify-content-center">
            <p class="text-light mb-0 p-2 fs-4 fw-bold">Tienda Online de Textil Export</p>
        </header>
        <!--Menu -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 fw-bold" id="menu">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <span class="text-black-50 fs-5 fw-bold">Textil Export.</span>
                </a>
                <form class="d-flex" method="POST" action="controladores/ClienteControlador.php" id="buscadorProducto">
                    <input type="hidden" value="listar" name="operacion">
                    <input class="form-control me-2" type="search" id="filtro" placeholder="Buscar" name="filtro" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                    <button class="btn btn-secondary ms-2" type="button" id="quitarFiltro">Quitar filtro</button>
                </form>
            </div>
        </nav>

        <!-- Titulo -->
        <div class="container-fluid bg-light d-flex justify-content-center">
            <p class="text-dark mb-0 p-5 fs-1 fw-bold">Listado de nuestros productos</p>
        </div>
        <div style="display:none" class='divErroresMain' id="Mensaje">

        </div>

        <!-- Ventana Modal de Más Información -->
        <div class="modal fade" id="MasInfoModal" tabindex="-1" aria-labelledby="MasInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MasInfoModalLabel">Informacion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <span id="detalles-nombre"></span></p>
                        <p><strong>Código:</strong> <span id="detalles-codigo"></span></p>
                        <p><strong>Categoría:</strong> <span id="detalles-categoria"></span></p>
                        <p><strong>Descripción:</strong> <span id="detalles-descripcion"></span></p>
                        <p><strong>Precio:</strong> $<span id="detalles-precio"></span></p>
                        <p><strong>Existencias:</strong> <span id="detalles-existencias"></span></p>
                        <p><strong>Estado:</strong> <span id="detalles-estado"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana Modal de Comprar -->
        <div class="modal fade" id="ComprarModal" tabindex="-1" aria-labelledby="ComprarModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ComprarModalLabel">Comprar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="controladores/ClienteControlador.php" id="CompraProducto">
                        <div class="modal-body">
                            <h3 class="text-center mb-3">¿Está seguro de querer comprar "<span id="compra-nombre"></span>"? </h3>
                            <p class="text-center"><i>(Solo esta simulado la compra) Por: $<span id="compra-precio"></span> c/u</i> </p>

                            <input type="hidden" name="operacion" value="compra">
                            <input type="hidden" name="IdProducto" id="compra-codigo">
                            <div class="col-md-10 offset-md-1">
                                <label for="cantidad">Cantidad a Comprar</label>
                                <div class="input-group mb-3">
                                    <input required step="1" min="1" value="1" id="cantidad" name="cantidad" type="number" class="form-control" placeholder="Cantidad a comprar" aria-label="Cantidad a comprar" aria-describedby="compra-existencias">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="compra-existencias"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="card-number">Número de tarjeta</label>
                                    <input pattern="^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$" 
                                    required type="text" class="form-control" id="card-number" placeholder="Ingresa el número de tu tarjeta">
                                </div><br>
                                <div class="form-group">
                                    <label for="expiration-date">Fecha de expiración</label>
                                    <input required type="date" class="form-control" id="expiration-date" placeholder="MM/AA">
                                </div><br>
                                <div class="form-group">
                                    <label for="security-code">Código de seguridad</label>
                                    <input pattern="^[0-9]{3,4}$" required type="text" class="form-control" id="security-code" placeholder="CVC">
                                </div><br>
                                <div class="form-group">
                                    <label for="card-holder">Nombre del titular de la tarjeta</label>
                                    <input pattern="^((?:[A-Za-z]+ ?){1,3})$" required type="text" class="form-control" id="card-holder" placeholder="Ingresa el nombre del titular de la tarjeta">
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Comprar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Listado de productos -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <div class="productosList" id="productosList">
            <!-- Aqui se muestra el listado de productos -->
        </div>
        <script src="assets/js/AjaxCliente.js"></script>

        <!-- footer -->
        <footer class="bg-dark py-5 mt-5">
            <div class="container text-light text-center">
                <p class="display-5 mb-3">Textil Export</p>
                <small class="text-white-50"> &copy; Copyright by Diego Ariel Martinez Lemus & Cristian Alexis Lopez Tamayo. All rights reserved </small>
                <br><br> <a href="controladores/UsuarioControlador.php?operacion=logout">
                    <button id="btnLogout" type="button" class="btn btn-danger btn-lg">Cerrar Sesión</button> </a>
            </div>
        </footer>
    </body>

    </html>
<?php
    }
}
?>