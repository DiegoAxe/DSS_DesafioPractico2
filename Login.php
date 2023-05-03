<?php
session_start();
if (isset($_SESSION['TipoUsuario'])) {
    echo "<h1> Ya ha iniciado sesión </h1>          <br>";
        if ($_SESSION['TipoUsuario'] == "Cliente") {
          echo "<a href='IndexCliente.php'><button type='button'> Regresar a la Tienda </button></a>";
        }else{
          echo "<a href='IndexProductos.php'><button type='button'> Regresar a la lista de Productos </button></a>";
        }
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Formulario de inicio de sesión</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/Login.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
        <form id="formLogin" method="POST" action="controladores/UsuarioControlador.php" class="form-signin">
          <input type="hidden" name="operacion" value="loguearse">
          <h3>Iniciar sesión</h3>
          <div id="Mensajes" style="display:none" class="alert alert-danger">
            <!-- Mensajes de error -->
          </div>
          <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña" required>
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Iniciar sesión</button>
          <br>
          <b><a href="Registro.php" class=" text-center link-primary">Crear Usuario</a></b>
        </form>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/AjaxCliente.js"></script>
</body>

</html>
<?php
}
?>