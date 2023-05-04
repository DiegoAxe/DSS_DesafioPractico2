<!-- Modal de Editar un Producto -->
<div class="modal fade" id="editar_<?= $categoria['IdCategoria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
				</center>
			</div>
			<div class="modal-body">
				<p class="text-center">Ingrese la Informacion a Editar de la Categoria:</p>
				<div style="display:none" class='divErrores' id="m_edit_<?= $categoria['IdCategoria'] ?>">

				</div>

				<div class="container-fluid">
						<input form="formEditar_<?= $categoria['IdCategoria'] ?>" type="hidden" name="operacion" value="editar">
						<input form="formEditar_<?= $categoria['IdCategoria'] ?>" type="hidden" name="codigo" value="<?= $categoria['IdCategoria'] ?>">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Nombre">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $categoria['IdCategoria'] ?>" type="text" class="form-control" required name="nombre" id="Nombre" value="<?= $categoria['NombreCategoria'] ?>" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Descripcion">Descripción:</label>
							</div>
							<div class="col-sm-10">
								<textarea form="formEditar_<?= $categoria['IdCategoria'] ?>" rows="5" class="form-control" required name="desc" id="Descripcion" ><?= $categoria['Descripcion'] ?></textarea>
							</div>
						</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button form="formEditar_<?= $categoria['IdCategoria'] ?>" type="submit" value="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
			</div>

		</div>
	</div>
</div>