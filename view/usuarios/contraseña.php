<form id="frmnewcon" onsubmit="return cambiocontraseña()" method="POST">
    <div class="modal fade" id="contraseña" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset class="group-border">
                        <input type="text" hidden id="idusuario" name="idusuario">
                        <label for="">Escribe nueva contraseña</label>
                        <input type="text" id="newpass" name="newpass" class="form-control" required>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>