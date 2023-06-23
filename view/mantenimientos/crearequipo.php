<!-- Formulario (Editar) -->
<form id="frmcrearequipo" method="post" onsubmit="return crearequipo()">
    <div class="modal fade" id="crearequipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Equipo</span>
                                    <select name="idtipequ" id="idtipequ" class="form-control input-sm">
                                        <option selected >Selecione</option>
                                        <option value="1">Portatil</option>
                                        <option value="2">Escritorio</option>
                                        <option value="3">Impresora</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <select name="idsede" id="idsede" class="form-control input-sm">
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
                                    <select name="idarea" id="idarea" class="form-control input-sm">
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
                                    <input type="text" id="marca" name="marca" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="modelo" name="modelo" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Modelo</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Ram</span>
                                    <select name="tipram" id="tipram" class="form-control input-sm">
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
                                    <input type="text" id="ram" name="ram" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="procesa" name="procesa" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Procesador</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Tipo Disco</span>
                                    <select name="tipdis" id="tipdis" class="form-control input-sm">
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
                                    <input type="text" id="capdis" name="capdis" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="grafic" name="grafic" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Grafica</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Registro</span>
                                    <input type="date" id="fecha" name="fecha" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="serial" name="serial" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre Equipo</span>
                                    <input type="text" id="nomequ" name="nomequ" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="mac" name="mac" class="form-control input-sm">
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
                                    <input type="text" id="numfac" name="numfac" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Proovedor</span>
                                    <input type="text" id="proove" name="proove" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="valor" name="valor" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Valor Compra</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Descripcion</span>
                                    <textarea type="text" id="detall" name="detall" class="form-control input-sm" rows="3"></textarea>
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
