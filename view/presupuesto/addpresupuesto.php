
<!-- Formulario (Editar) -->
<form id="frmpresupuesto" method="post" onsubmit="return agregarpresupuesto()">
    <div class="modal fade" id="addpresupuesto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Nuevo Presupuesto</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" id="presupuesto" name="presupuesto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Editar) -->
