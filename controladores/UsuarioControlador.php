<?php
require '../modelos/daoUsuarios.php';
require "../clase/classUsuarios.php";

if (!empty($_REQUEST)) {
    $operacion = isset($_REQUEST['operacion']) ? $_REQUEST['operacion'] : "";

    switch ($operacion) {
        case 'clientes':
            $daoUsuario = new daoUsuario();
            $listaClientes = $daoUsuario->listaClientes();

            foreach ($listaClientes as $usuario) {

                include('../ventanasModals/usuarios/modal_Estado.php');
                echo "<tr>
                <td class='tdPequeno'>" . $usuario['IdUsuario'] . "</td>
                <td class='tdPequeno'>" . $usuario['Usuario'] . "</td>
                <td class='tdGrande'>" . $usuario['Correo'] . "</td>
                <td class='tdGrande' style='text-align:center'> ***** </td>
                <td class='tdPequeno'>";
                echo $usuario["Habilitado"] == 1 ? "Habilitado" : "Inhabilitado";
                echo "</td>
                <td class='tdGrande'>
                    <a href='#cambiar_" . $usuario['IdUsuario'] . "' data-toggle='modal'  class='btn btn-danger'>Cambiar Estado</a>
                </td>
            </tr>";
            }
            break;
        case 'cambiar':
            $idUsuario = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
            $daoUsuario = new daoUsuario();
            $daoUsuario->cambiarEstado($idUsuario);

            break;
        case 'empleados':
            $daoUsuario = new daoUsuario();
            $listaEmpleados = $daoUsuario->listaEmpleados();

            foreach ($listaEmpleados as $usuario) {
                echo "<form class='formEditar' id='formEditar_" . $usuario['IdUsuario'] . "' method='POST' action='controladores/UsuarioControlador.php'>
                </form>";
                include('../ventanasModals/usuarios/modal_Editar.php');
                include('../ventanasModals/usuarios/modal_Borrar.php');
                echo "<tr>
                    <td class='tdPequeno'>" . $usuario['IdUsuario'] . "</td>
                    <td class='tdPequeno'>" . $usuario['Usuario'] . "</td>
                    <td class='tdGrande'>" . $usuario['Correo'] . "</td>
                    <td class='tdGrande' style='text-align:center'> ***** </td>
                    <td class='tdPequeno'>" . $usuario['TipoUsuario'] . "</td>
                    <td class='tdGrande'>
                    <a href='#editar_" . $usuario['IdUsuario'] . "' data-toggle='modal'' class='btn btn-primary'>Editar</a>
                    <a href='#borrar_" . $usuario['IdUsuario'] . "' data-toggle='modal'  class='btn btn-danger'>Eliminar</a>
                    </td>
                </tr>";
            }
            break;

        case 'loguearse':
            $Correo = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
            $Contra = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
            $Contra = hash('sha512', $Contra);
            $daoUsuario = new daoUsuario();
            $Usuario = $daoUsuario->Correo_Contra($Correo, $Contra);

            if ($Usuario[0] == 1) {
                if ($Usuario["Habilitado"] == 0) {
                    echo "La cuenta está deshabilitada";
                } else {
                    session_start();
                    $_SESSION['IdUsuario'] = $Usuario['IdUsuario'];
                    $_SESSION['TipoUsuario'] = $Usuario['TipoUsuario'];
                    if ($_SESSION["TipoUsuario"] == "Cliente") {
                        echo "<script> window.location.replace('IndexCliente.php'); </script>";
                    } else {
                        echo "<script> window.location.replace('IndexProductos.php'); </script>";
                    }
                }
            } else {
                echo "Datos incorrectos";
            }
            break;
        case 'registrarse';
            $habil = 1;
            $User = isset($_REQUEST['user']) ? $_REQUEST['user'] : "";
            $Correo = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
            $Contra = isset($_REQUEST['password']) ? $_REQUEST['password'] : "";
            $Contra = hash('sha512', $Contra);
            $Confirma = isset($_REQUEST['confirm_password']) ? $_REQUEST['confirm_password'] : "";
            $Confirma = hash('sha512', $Confirma);
            $daoUsuario = new daoUsuario();
            $Usuario = $daoUsuario->Correo_o_Usuario($Correo, $User);

            if ($Usuario[0] == 0) {

                if ($Contra == $Confirma) {
                    $Usuario = new Usuario(0, $User, $Correo, $Contra, $habil, "Cliente");
                    $daoUsuario->insertar($Usuario);
                    echo "<script> window.location.replace('Login.php'); </script>";
                } else {
                    echo "Las contraseñas no coinciden";
                }
            } else {
                echo "Usuario o Correo ya utilizado, ingrese otro";
            }
            break;
        case 'logout':
            session_start();
            session_unset();
            session_destroy();
            echo "<script> window.location.replace('../Login.php'); </script>";
            break;


        case 'registrar':
            extract($_POST);
            $contra = hash('sha512', $contra);
            $Usuario = new Usuario($codigo, $nombre, $email, $contra, $habil, $tipo);

            $daoUsuario = new daoUsuario();
            $daoUsuario->insertar($Usuario);

            break;
        case 'editar':
            extract($_POST);
            $contra = hash('sha512', $contra);
            $Usuario = new Usuario($codigo, $nombre, $email, $contra, $habil, $tipo);

            $daoUsuario = new daoUsuario();
            $daoUsuario->modificar($Usuario);

            break;

        case 'borrar':
            $idUsuario = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : "";
            $daoUsuario = new daoUsuario();
            $daoUsuario->eliminar($idUsuario);

            break;
    }
}
