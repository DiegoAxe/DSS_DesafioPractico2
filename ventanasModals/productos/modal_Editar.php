<!-- Modal de Editar un Producto -->
<div class="modal fade" id="editar_<?= $producto['IdProducto'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
				</center>
			</div>
			<div class="modal-body">
				<p class="text-center">Ingrese la Informacion a Editar del Producto:</p>
				<div style="display:none" class='divErrores' id="m_edit_<?= $producto['IdProducto'] ?>">

				</div>

				<div class="container-fluid">
						<input form="formEditar_<?= $producto['IdProducto'] ?>" type="hidden" name="operacion" value="editar">
						<input form="formEditar_<?= $producto['IdProducto'] ?>" type="hidden" name="codigo" value="<?= $producto['IdProducto'] ?>">

						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Nombre">Nombre:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $producto['IdProducto'] ?>" type="text" class="form-control" required name="nombre" id="Nombre" value="<?= $producto['NombreProducto'] ?>" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Descripcion">Descripción:</label>
							</div>
							<div class="col-sm-10">
								<textarea form="formEditar_<?= $producto['IdProducto'] ?>" rows="5" class="form-control" required name="desc" id="Descripcion" ><?= $producto['DescProducto'] ?></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Img">Imagen:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $producto['IdProducto'] ?>" class="form-control" required id="Img" type="file" name="img" accept="image/png, image/jpeg" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Categoria">Categoria:</label>
							</div>
							<div class="col-sm-10">
								<select form="formEditar_<?= $producto['IdProducto'] ?>" class="select_categ" id="Categoria" name="categ">
									<?php
									foreach ($listaCategorias as $categoria) {
										$Elejido = ($producto["IdCategoria"] == $categoria["IdCategoria"]) ? "selected" : "";
										echo "<option $Elejido value ='" . $categoria["IdCategoria"] . "'>" . $categoria["NombreCategoria"] . "</option> 
										";
									}
									?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Precio">Precio:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $producto['IdProducto'] ?>" class="form-control" required type="number" id="Precio" name="precio" min="0" step="0.01" value="<?= $producto['Precio'] ?>" >
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label" for="Existencias">Existencias:</label>
							</div>
							<div class="col-sm-10">
								<input form="formEditar_<?= $producto['IdProducto'] ?>" class="form-control" required type="number" id="Existencias" name="exist" min="0" step="1" value="<?= $producto['Existencias'] ?>" > <br>
							</div>
						</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
				<button form="formEditar_<?= $producto['IdProducto'] ?>" type="submit" value="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
			</div>

		</div>
	</div>
</div>