<!-- Formulario (Editar) -->
<form id="formcrearcorreo" method="post" onsubmit="return agregarcorreo()">
    <div class="modal fade" id="newcorreo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Nueva Contraseña</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Correo</span>
                                    <input type="text" id="correo" name="correo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Sede</span>
                                    <select name="idsede" id="idsede" class="form-control input-sm">
                                        <option value="0">Seleccione Una Sede</option>
                                        <?php
                                        $sql="SELECT s.id_sede as idsede, s.sed_nombre as sede FROM sedes as s";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($sede = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $sede['idsede']?>"><?php echo $sede['sede'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Area</span>
                                    <select name="idarea" id="idarea" class="form-control input-sm">
                                        <option value="">Seleccione Un Area</option>
                                        <?php
                                        $sql="SELECT a.id_area as idarea, a.are_nombre as area FROM areas as a";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($area = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $area['idarea']?>"><?php echo $area['area'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                                    <input type="text" id="password" name="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
