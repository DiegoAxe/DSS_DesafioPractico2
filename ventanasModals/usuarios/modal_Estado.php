<!-- Modal de Borrar un Producto -->
<div class="modal fade modalBorrar" id="cambiar_<?= $usuario['IdUsuario'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Cambiar Estado</h4>
                </center>
            </div>
            <div class="modal-body">
                <p class="text-center">Está seguro que deseas cambiar el estado del usuario?</p>
                <h2 class="text-center"><?= ($usuario["Habilitado"]) == 1 ? "Habilitado" : "Inhabilitado" ?>
                <span class="glyphicon glyphicon-arrow-right"></span> <?= ($usuario["Habilitado"]) == 1 ? "Inhabilitado" : "Habilitado" ?>
                </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="button" class="btn btn-info btnCambio" value="<?= $usuario['IdUsuario'] ?>"><span class="glyphicon glyphicon-user"></span> Cambiar</button>
            </div>

        </div>
    </div>
</div>