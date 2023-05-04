<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
  echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
  if ($_SESSION['TipoUsuario'] != "Cliente") {
    echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexProductos.php'><button type='button'> Regresar a la lista de Productos </button></a>";
  } else {

    require '../modelos/daoProductos.php';
    require '../modelos/daoVentas.php';
    require "../clase/classVentas.php";

    if (!empty($_REQUEST)) {
      $operacion = isset($_REQUEST['operacion']) ? $_REQUEST['operacion'] : "";
      $busqueda = isset($_REQUEST['filtro']) ? $_REQUEST['filtro'] : "";

      switch ($operacion) {
        case 'listar':
          $daoProductos = new daoProducto();
          $listaProductos = $daoProductos->listaProductos();
          if ($busqueda != "") {
            $listaProductos = $daoProductos->buscarProducto($busqueda);
          }
          foreach ($listaProductos as $producto) {
            echo ' <div class="list-group mt-4 d-flex">
         <div class="d-flex list-group-item ">
              <div class="p-2">
                <img src="' . 'imagenes/' . $producto['ImgProducto'] . '" class="img-thumbnail" width="250" alt="' . $producto['NombreProducto'] . '">
              </div>
              <div class="d-flex flex-column align-items-start justify-content-between p-2">
                <h5 class="mb-1">' . $producto['NombreProducto'] . '</h5>
                <p class="mb-1">Informacion del producto: <br>' . $producto['DescProducto'] . '</p>

                <div>
                <button type="button" class="btn btn-primary detalles-btn" data-bs-toggle="modal" 
                  data-bs-target="#MasInfoModal" data-codigo="' . $producto['IdProducto'] . '" 
                  data-nombre="' . $producto['NombreProducto'] . '" data-descripcion="' . $producto['DescProducto'] . '" 
                  data-categoria="' . $producto['NombreCategoria'] . '" data-precio="' . $producto['Precio'] . '" 
                  data-existencias="' . $producto['Existencias'] . '">
                Más Información</button>
                
                <button type="button" class="btn btn-success compra-btn" data-bs-toggle="modal" 
                  data-bs-target="#ComprarModal" data-codigo="' . $producto['IdProducto'] . '" 
                  data-nombre="' . $producto['NombreProducto'] . '" data-precio="' . $producto['Precio'] . '" 
                  data-existencias="' . $producto['Existencias'] . '"';
            if ($producto['Existencias'] == 0) {
              echo 'disabled';
            }
            echo '>
                Comprar</button>
                </div>

              </div>
            </div>
          
        </div>';
          }
          echo '<script src="assets/js/modalMasInfo.js"></script>';
          echo '<script src="assets/js/modalCompra.js"></script>';
          if (count($listaProductos) == 0) {
            echo '<div class="list-group mt-4 d-flex">
          <h1 style="text-align:center"> No se encontro ningun resultado de su búsqueda. </h1>
        </div>';
          }
          break;

        case 'compra';
          extract($_POST);
          session_start();
          $cliente = $_SESSION['IdUsuario'];              //Esta deberia de recibir la id del cliente
          $daoProductos = new daoProducto();
          $daoProductos->CompraProducto($IdProducto, $cantidad);

          $Venta = new Venta(0, $cantidad, "fecha", $IdProducto, $cliente);
          $daoVentas = new daoVenta();
          $daoVentas->insertar($Venta);
          header("Location: ClienteControlador.php?operacion=pdf");

          break;

        case 'pdf':
          $daoVenta = new daoVenta();
          $VentaEspecifica = $daoVenta->ultimaVenta();

          //Variables para el PDF
          $NumVenta = $VentaEspecifica["IdVenta"];
          $FechaCompra = $VentaEspecifica["FechaVenta"];
          $NombCliente = $VentaEspecifica["Usuario"];
          $CantVenta = $VentaEspecifica["Cantidad"];
          $PrecProduct = $VentaEspecifica["Precio"];
          $NombProduct = $VentaEspecifica["NombreProducto"];

          include('../assets/GeneradorPDF.php');
          break;
      }
    }
  }
}
