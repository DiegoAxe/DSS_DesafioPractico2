<!-- Modal de Editar un Producto -->
<div class="modal fade" id="editar_<?= $usuario['IdUsuario'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Editar Empleado</h4>
				</center>
			</div>
			<div class="modal-body">
				<p class="text-center">Ingrese la Informacion a Editar del Empleado:</p>
				<div style="display:none" class='divErrores' id="m_edit_<?= $usuario['IdUsuario'] ?>">

				</div>

				<div class="container-fluid">
						<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="hidden" name="habil" value="0">
						<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="hidden" name="operacion" value="editar">
						<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="hidden" name="codigo" value="<?= $usuario['IdUsuario'] ?>">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Nombre">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="text" class="form-control" required name="nombre" id="Nombre" value="<?= $usuario['Usuario'] ?>" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Tipo">Tipo de Usuario:</label>
							</div>
							<div class="col-sm-10">
								<select form="formEditar_<?= $usuario['IdUsuario'] ?>" class="select_categ" id="Tipo" name="tipo">
									<option value="Administrador">Administrador</option>
									<option value="Empleado" selected>Empleado</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Correo">Correo:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="email" class="form-control" name="email" id="Correo" value="<?= $usuario['Correo'] ?>" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Contrasena">Contraseña:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $usuario['IdUsuario'] ?>" type="password" class="form-control" name="contra" id="Contrasena" value="" required>
							</div>
						</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button form="formEditar_<?= $usuario['IdUsuario'] ?>" type="submit" value="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
			</div>

		</div>
	</div>
</div>