<?php
session_start();
if (!isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Inicie sesión primero </h1>          <br>
        <a href='Login.php'><button type='button'> Regresar al Login </button></a>";
} else {
    if ($_SESSION['TipoUsuario'] == "Empleado") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexProductos.php'><button type='button'> Regresar a la lista de Productos </button></a>";
    } else if ($_SESSION['TipoUsuario'] == "Cliente") {
        echo "<h1> Ústed no tiene permiso para acceder a esta página </h1>          <br>
            <a href='IndexCliente.php'><button type='button'> Regresar a la Tienda </button></a>";
    } else {
        require '../modelos/daoCategorias.php';
        require "../clase/classCategorias.php";

        if (!empty($_REQUEST)) {
            $operacion = isset($_REQUEST['operacion']) ? $_REQUEST['operacion'] : "";

            switch ($operacion) {
                case 'listar':
                    $daoCategorias = new daoCategoria();
                    $listaCategorias = $daoCategorias->listaCategorias();
                    foreach ($listaCategorias as $categoria) {
                        echo "<form class='formEditar' id='formEditar_" . $categoria['IdCategoria'] . "' method='POST' action='controladores/CategoriaControlador.php'>
                </form>";
                        include('../ventanasModals/categorias/modal_Editar.php');
                        include('../ventanasModals/categorias/modal_Borrar.php');
                        echo "<tr>
                <td class='tdPequeno'>" . $categoria['IdCategoria'] . "</td>
                <td class='tdPequeno'>" . $categoria['NombreCategoria'] . "</td>
                <td class='tdGrande'>" . $categoria['Descripcion'] . "</td>
                <td class='tdGrande'>
                    <a href='#editar_" . $categoria['IdCategoria'] . "' data-toggle='modal'' class='btn btn-primary'>Editar</a>
                    <a href='#borrar_" . $categoria['IdCategoria'] . "' data-toggle='modal'  class='btn btn-danger'>Eliminar</a>
                </td>
            </tr>";
                    }
                    break;

                case 'registrar':
                    extract($_POST);
                    $Categoria = new Categoria($codigo, $nombre, $desc);

                    $daoCategoria = new daoCategoria();
                    $daoCategoria->insertar($Categoria);

                    break;
                case 'editar':
                    extract($_POST);
                    $Categoria = new Categoria($codigo, $nombre, $desc);

                    $daoCategoria = new daoCategoria();
                    $daoCategoria->modificar($Categoria);

                    break;

                case 'borrar':
                    $idCategoria = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
                    $daoCategoria = new daoCategoria();
                    $daoCategoria->eliminar($idCategoria);

                    break;
            }
        }
    }
}
