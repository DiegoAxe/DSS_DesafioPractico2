<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
    if ($_SESSION['TipoUsuario'] == "Cliente") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexCliente.php'><button type='button'> Regresar a la Tienda  </button></a>";
    } else {
        require '../modelos/daoProductos.php';
        require '../modelos/daoCategorias.php';
        require "../clase/classProductos.php";

        if (!empty($_REQUEST)) {
            $operacion = isset($_REQUEST['operacion']) ? $_REQUEST['operacion'] : "";

            switch ($operacion) {
                case 'listar':
                    $daoCategorias = new daoCategoria();
                    $listaCategorias = $daoCategorias->listaCategorias();
                    $daoProductos = new daoProducto();
                    $listaProductos = $daoProductos->listaProductos();

                    foreach ($listaProductos as $producto) {
                        echo "<form class='formEditar' id='formEditar_" . $producto['IdProducto'] . "' method='POST' action='controladores/ProductoControlador.php' enctype='multipart/form-data'>
                </form>";
                        include('../ventanasModals/productos/modal_Editar.php');
                        include('../ventanasModals/productos/modal_Borrar.php');
                        echo "<tr>
                <td class='tdPequeno'>" . $producto['IdProducto'] . "</td>
                <td class='tdPequeno'>" . $producto['NombreProducto'] . "</td>
                <td class='tdGrande'>" . $producto['DescProducto'] . "</td>
                <td class='tdMedio'><img class='ProductImg' src='imagenes/" . $producto['ImgProducto'] . "' alt=" . $producto['ImgProducto'] . "> </td>
                <td class='tdPequeno'>" . $producto['NombreCategoria'] . "</td>
                <td class='tdPequeno'>$" . $producto['Precio'] . "</td>
                <td class='tdPequeno'>" . $producto['Existencias'] . "</td>
                <td class='tdGrande'>
                    <a href='#editar_" . $producto['IdProducto'] . "' data-toggle='modal'' class='btn btn-primary'>Editar</a>
                    <a href='#borrar_" . $producto['IdProducto'] . "' data-toggle='modal'  class='btn btn-danger'>Eliminar</a>
                </td>
            </tr>";
                    }
                    break;

                case 'categorias':
                    $daoCategorias = new daoCategoria();
                    $listaCategorias = $daoCategorias->listaCategorias();
                    foreach ($listaCategorias as $categoria) {
                        echo "<option $ value ='" . $categoria["IdCategoria"] . "'>" . $categoria["NombreCategoria"] . "</option>";
                    }
                    break;

                case 'registrar':
                    extract($_POST);
                    $img = isset($_FILES['img']) ? $_FILES['img'] : null;
                    $Producto = new Producto($codigo, $nombre, $desc, $img, $categ, $precio, $exist);
                    $errores = $Producto->ValidacionDatos();
                    //Exporta la img
                    $Producto->ExportImg();

                    $daoProductos = new daoProducto();
                    $daoProductos->insertar($Producto);

                    break;
                case 'editar':
                    extract($_POST);
                    $img = isset($_FILES['img']) ? $_FILES['img'] : null;
                    $Producto = new Producto($codigo, $nombre, $desc, $img, $categ, $precio, $exist);
                    //Exporta la img
                    $Producto->ExportImg();

                    $daoProductos = new daoProducto();
                    $daoProductos->modificar($Producto);

                    break;

                case 'borrar':
                    $idProducto = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
                    $daoProductos = new daoProducto();
                    $daoProductos->eliminar($idProducto);

                    break;
            }
        }
    }
}
