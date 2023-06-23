<!-- Formulario (Editar) -->
<form id="frmagrecompra" method="post" onsubmit="return agregarcompra()">
    <div class="modal fade" id="agregarcompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Compra</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Sede</span>
                                    <select name="idsede" id="idsede" class="form-control input-sm">
                                        <option selected >Selecione Sede</option>
                                        <option value="1">CERAMICASAS</option>
                                        <option value="2">FERRECASAS</option>
                                        <option value="3">METROPOLIS</option>
                                        <option value="4">MAYORISTA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
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
                                    <span class="input-group-text" id="inputGroup-sizing-default">Area</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Cantidad</span>
                                    <input type="text" id="cantid" name="cantid" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Producto</span>
                                    <input type="text" id="nompro" name="nompro" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="serial" name="serial" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Factura</span>
                                    <input type="text" id="numfac" name="numfac" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="input-group mb-3">
                                    <input type="text" id="proove" name="proove" class="form-control input-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Valor Compra</span>
                                    <input type="text" id="valor" name="valor" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Compra</span>
                                    <input type="date" id="feccom" name="feccom" class="form-control input-sm">
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
