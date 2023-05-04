<!-- Modal de registrar nuevo Producto -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Nuevo Categoria</h4>
				</center>
			</div>
			<div class="modal-body">
				<div style="display:none" class='divErrores' id="divErrorRegister">

				</div>
				<div class="container-fluid">
					<form id="formRegistro" action="controladores/CategoriaControlador.php" method="POST">
						<input type="hidden" name="operacion" value="registrar">
						<input type="hidden" class="form-control" name="codigo" id="Codigo" value="0">

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