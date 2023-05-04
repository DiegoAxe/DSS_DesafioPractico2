<!-- Modal de Borrar un Producto -->
<div class="modal fade modalBorrar" id="borrar_<?= $usuario['IdUsuario']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Eliminar Empleado</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Está seguro que deseas borrar el Empleado?</p>
				<h2 class="text-center"><?= $usuario['Usuario'] ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>        
                <button type="button" class="btn btn-danger btnBorrar" value="<?= $usuario['IdUsuario']?>"><span class="glyphicon glyphicon-trash"></span> Borrar</button>
            </div>
 
        </div>
    </div>
</div>