<!-- Modal de registrar nuevo Producto -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
				</center>
			</div>
			<div class="modal-body">
				<div style="display:none" class='divErrores' id="divErrorRegister">

				</div>
				<div class="container-fluid">
					<form id="formRegistro" action="controladores/ProductoControlador.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="operacion" value="registrar">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Codigo">Codigo:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="codigo" id="Codigo" value="" required>
							</div>
						</div>
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
								<label class="control-label" for="Descripcion">Descripción:</label>
							</div>
							<div class="col-sm-10">
								<textarea rows="5" class="form-control" name="desc" id="Descripcion" required></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Img">Imagen:</label>
							</div>
							<div class="col-sm-10">
								<input class="form-control" id="Img" type="file" name="img" accept="image/png, image/jpeg" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="CategoriaRegistro">Categoria:</label>
							</div>
							<div class="col-sm-10">
								<select class="select_categ" id="CategoriaRegistro" name="categ">

								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Precio">Precio:</label>
							</div>
							<div class="col-sm-10">
								<input class="form-control" type="number" name="precio" min="0" step="0.01" value="" required>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Existencias">Existencias:</label>
							</div>
							<div class="col-sm-10">
								<input class="form-control" type="number" name="exist" min="0" step="1" value="" required> <br>
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