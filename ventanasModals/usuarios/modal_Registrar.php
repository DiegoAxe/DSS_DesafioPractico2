<!-- Modal de registrar nuevo Producto -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Empleado</h4>
				</center> 
			</div>
			<div class="modal-body">
				<div style="display:none" class='divErrores' id="divErrorRegister">

				</div>
				<div class="container-fluid">
					<form id="formRegistro" action="controladores/UsuarioControlador.php" method="POST">
						<input type="hidden" name="operacion" value="registrar">
						<input type="hidden" class="form-control" name="codigo" id="Codigo" value="0">
						<input type="hidden" name="habil" id="Habil" value="0">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Nombre">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="nombre" id="Nombre" value="" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Tipo">Tipo de Usuario:</label>
							</div>
							<div class="col-sm-10">
								<select class="select_categ" id="Tipo" name="tipo">
									<option value="Administrador">Administrador</option>
									<option value="Empleado">Empleado</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Correo">Correo:</label>
							</div>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" id="Correo" value="" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Contrasena">Contraseña:</label>
							</div>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="contra" id="Contrasena" value="" required>
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Registrar</button>
					</form>
			</div>

		</div>
	</div>
</div>