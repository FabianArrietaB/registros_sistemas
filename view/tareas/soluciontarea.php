<!-- Formulario (Editar) -->
<form id="frmeditartarea" method="post" onsubmit="return soluciontarea()">
    <div class="modal fade" id="editartarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input hidden type="text" id="idtarea" name="idtarea" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Equipo</span>
                                    <select disabled name="idasignadou" id="idasignadou" class="form-control input-sm">
                                        <option selected >Selecione Encargado</option>
                                        <option value="1">Fabian</option>
                                        <option value="2">Jesus</option>
                                        <option value="3">Todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select disabled name="idnivelu" id="idnivelu" class="form-control input-sm">
                                        <option selected >Selecione Nivel</option>
                                        <option value="1">BASICO</option>
                                        <option value="2">MEDIO</option>
                                        <option value="3">URGENTE</option>
                                    </select>
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nivel</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Registro</span>
                                    <input disabled type="date" id="fecopeu" name="fecopeu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Entrega</span>
                                    <input type="date" id="fecrea" name="fecrea" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Descripcion Actividad</span>
                                    <textarea disabled type="text" id="detalleu" name="detalleu" class="form-control input-sm" rows="3"></textarea>
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
