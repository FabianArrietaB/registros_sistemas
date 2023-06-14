<!-- Formulario (Editar) -->
<form id="frmcreartarea" method="post" onsubmit="return creartarea()">
    <div class="modal fade" id="creartarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Tarea</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Equipo</span>
                                    <select name="idasignado" id="idasignado" class="form-control input-sm">
                                        <option selected >Selecione Encargado</option>
                                        <option value="1">Fabian</option>
                                        <option value="2">Jesus</option>
                                        <option value="3">Todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="nivel" id="nivel" class="form-control input-sm">
                                        <option selected >Selecione Nivel</option>
                                        <option value="1">BASICO</option>
                                        <option value="2">MEDIO</option>
                                        <option value="3">URGENTE</option>
                                    </select>
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nivel</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Descripcion Actividad</span>
                                    <textarea type="text" id="detalle" name="detalle" class="form-control input-sm" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Registro</span>
                                    <input type="date" id="fecini" name="fecini" class="form-control input-sm">
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
