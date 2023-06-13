<!-- Formulario (Editar) -->
<form id="frmeditarequipo" method="post" onsubmit="return editarequipo()">
    <div class="modal fade" id="editarequipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Equipo</legend>
                        <div class="row">
                            <input hidden type="text" id="idequipo" name="idequipo" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Equipo</span>
                                    <select name="idtipequu" id="idtipequu" class="form-control input-sm">
                                        <option selected >Selecione</option>
                                        <option value="1">Portatil</option>
                                        <option value="2">Escritorio</option>
                                        <option value="3">Impresora</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="idsedeu" id="idsedeu" class="form-control input-sm">
                                        <option selected >Selecione</option>
                                        <option value="1">CERAMICASAS</option>
                                        <option value="2">FERRECASAS</option>
                                        <option value="3">METROPOLIS</option>
                                        <option value="4">MAYORISTA</option>
                                    </select>
                                    <span class="input-group-text" id="inputGroup-sizing-default">Sede</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Area</span>
                                    <select name="idareau" id="idareau" class="form-control input-sm">
                                        <option selected >Selecione Area</option>
                                        <?php
                                        $sql="SELECT a.id_area as idarea, a.are_nombre as area FROM areas as a";
                                        $respuesta = mysqli_query($conexion, $sql);
                                        while($persona = mysqli_fetch_array($respuesta)) {
                                        ?>
                                        <option value="<?php echo $persona['idarea']?>"><?php echo $persona['area'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Marca</span>
                                    <input type="text" id="marcau" name="marcau" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="modelou" name="modelou" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Modelo</span>
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Ram</span>
                                    <select name="tipramu" id="tipramu" class="form-control input-sm">
                                        <option selected >Selecione</option>
                                        <option value="1">DDR2</option>
                                        <option value="2">DDR3</option>
                                        <option value="3">DDR4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Ram</span>
                                    <input type="text" id="ramu" name="ramu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="procesau" name="procesau" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Procesador</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Disco</span>
                                    <select name="tipdisu" id="tipdisu" class="form-control input-sm">
                                        <option selected >Selecione</option>
                                        <option value="1">HDD</option>
                                        <option value="2">SSD</option>
                                        <option value="3">M2</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Capacidad</span>
                                    <input type="text" id="capdisu" name="capdisu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="graficau" name="graficau" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Grafica</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Registro</span>
                                    <input type="date" id="fechau" name="fechau" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="serialu" name="serialu" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Editar) -->
