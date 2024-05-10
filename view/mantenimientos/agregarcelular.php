<!-- Formulario (Editar) -->
<form id="frmcrearcelular" method="post" onsubmit="return crearcelular()">
    <div class="modal fade" id="addcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Equipo</legend>
                        <div class="row">
                            <input hidden type="text" id="idtipequcel" name="idtipequcel" value="6" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Sede</span>
                                    <select name="idsedecel" id="idsedecel" class="form-control input-sm">
                                        <option value="">Seleccione Una Sede</option>
                                        <?php
                                        $sql="SELECT s.id_sede as idsede, s.sed_nombre as sede FROM sedes as s WHERE s.sed_estado = 1";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($persona = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $persona['idsede']?>"><?php echo $persona['sede'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="idareacel" id="idareacel" class="form-control input-sm">
                                        <option selected >Selecione Area</option>
                                        <?php
                                        $sql="SELECT a.id_area as idarea, a.are_nombre as area FROM areas as a";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($persona = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $persona['idarea']?>"><?php echo $persona['area'];?></option>
                                        <?php }?>
                                    </select>
                                    <span class="input-group-text" id="inputGroup-sizing-default">Area</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Marca</span>
                                    <input type="text" id="marcacel" name="marcacel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="modelocel" name="modelocel" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Modelo</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="ramcel" name="ramcel" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Ram</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Procesador</span>
                                    <input type="text" id="procesacel" name="procesacel" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Capacidad</span>
                                    <input type="text" id="capdiscel" name="capdiscel" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="date" id="fechacel" name="fechacel" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Registro</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
                                    <input type="text" id="serialcel" name="serialcel" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Imei 1</span>
                                    <input type="text" id="imei1" name="imei1" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="imei2" name="imei2" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Imei 2</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre Equipo</span>
                                    <input type="text" id="nomequcel" name="nomequcel" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="maccel" name="maccel" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">MAC</span>
                                </div>
                            </div>
                        </div>
                    </fieldset><!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Factura</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Factura</span>
                                    <input type="text" id="numfaccel" name="numfaccel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Proovedor</span>
                                    <input type="text" id="proovecel" name="proovecel" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="valorcel" name="valorcel" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Valor Compra</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Descripcion</span>
                                    <textarea type="text" id="detallcel" name="detallcel" class="form-control input-sm" rows="3"></textarea>
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
