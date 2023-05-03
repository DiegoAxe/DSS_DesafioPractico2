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
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de registro</title>
  <!-- Agregamos los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/Login.css">
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Formulario de registro</h3>
          </div>
          <div id="Mensajes" style="display:none" class="alert alert-danger">
            <!-- Mensajes de error -->
          </div>
          <div class="card-body">
            <form id="formRegistro" action="controladores/UsuarioControlador.php" method="POST">
              <input type="hidden" name="operacion" value="registrarse">
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="user" id="usuario" class="form-control" placeholder="Ingresa tu nombre completo" required>
              </div>
              <div class="form-group">
                <label for="correo">Correo electrónico</label>
                <input type="email" name="email" id="correo" class="form-control" placeholder="Ingresa tu correo electrónico" required>
              </div>
              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirmar contraseña</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirma tu contraseña" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
              </div>
            </form>
            <b><a href="Login.php" class="text-center link-primary">Iniciar Sesion</a></b>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Agregamos los archivos JS de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/AjaxCliente.js"></script>
</body>

</html>
<?php
}
?>