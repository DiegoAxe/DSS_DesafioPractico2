<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='../Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
    if ($_SESSION['TipoUsuario'] == "Cliente") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexCliente.php'><button type='button'> Regresar a la Tienda </button></a>";
    } else {

        require '../modelos/daoVentas.php';
        require "../clase/classVentas.php";

        if (!empty($_REQUEST)) {
            $operacion = isset($_REQUEST['operacion']) ? $_REQUEST['operacion'] : "";

            switch ($operacion) {
                case 'listar':
                    $daoVenta = new daoVenta();
                    $listaVentas = $daoVenta->listaVentas();
                    foreach ($listaVentas as $venta) {
                        echo "<tr>
                <td class='tdPequeno'>" . $venta['IdVenta'] . "</td>
                <td class='tdGrande'>" . $venta['NombreProducto'] . "</td>
                <td class='tdPequeno'>" . $venta['Cantidad'] . "</td>
                <td class='tdPequeno'>$" . $venta['Precio'] . "</td>
                <td class='tdPequeno'>" . $venta['FechaVenta'] . "</td>
                <td class='tdPequeno'>" . $venta['Usuario'] . "</td>
                <td class='tdGrande'>
                    <a target='_blank' href='controladores/VentaControlador.php?operacion=pdf&code=" . $venta['IdVenta'] . "' class='btn btn-info'>Generar PDF</a>
                </td>
            </tr>";
                    }
                    break;

                case 'pdf':
                    $idVenta = isset($_REQUEST['code']) ? $_REQUEST['code'] : "";
                    $daoVenta = new daoVenta();
                    $VentaEspecifica = $daoVenta->mostrarVenta($idVenta);

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
