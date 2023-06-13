<!-- Formulario (Editar) -->
<form id="frmcodactivo" method="post" onsubmit="return agregaractivo()">
    <div class="modal fade" id="codactivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Agregar Codigo</legend>
                        <div class="row">
                            <input hidden type="text" id="idequipo" name="idequipo" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Codigo Interno</span>
                                    <input type="text" id="codactu" name="codactu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
