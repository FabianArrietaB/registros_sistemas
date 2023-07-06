<!-- Formulario (Editar) -->
<form id="formcrearclave" method="post" onsubmit="return agregarclave()">
    <div class="modal fade" id="crearclave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Agregar Informacion Equipo</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">TIPO EQUIPO</span>
                                    <select name="idtipo" id="idtipo" class="form-control input-sm">
                                        <option value="">SELECCIONAR DISPOSITIVO</option>
                                        <option value="1">SERVIDOR</option>
                                        <option value="2">ROUTER</option>
                                        <option value="3">DVR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="equipo" name="equipo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    <span class="input-group-text" id="inputGroup-sizing-default">NOMBRE EQUIPO</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                                    <input type="text" id="usuario" name="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="password" name="password" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Wifi</span>
                                    <input type="text" id="nonwif" name="nonwif" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Clave Wifi</span>
                                    <input type="text" id="calwif" name="calwif" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="marca" name="marca" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Marca</span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="modelo" name="modelo" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Modelo</span>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">IP</span>
                                    <input type="text" id="ip" name="ip" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Patron</span>
                                    <input type="text" id="patron" name="patron" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="serial" name="serial" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
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
