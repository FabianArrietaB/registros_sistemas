<!-- Formulario (Editar) -->
<div class="modal fade" id="detallecompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input hidden type="text" id="idventa" name="idventa" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Sede</span>
                                <select disabled name="idsede" id="idsedeu" class="form-control input-sm">
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
                                <input disabled type="text" id="areau" name="areau" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                <span class="input-group-text" id="inputGroup-sizing-default">Area</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Cantidad</span>
                                <input disabled type="text" id="cantidu" name="cantidu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Producto</span>
                                <input disabled type="text" id="nomprou" name="nomprou" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group mb-3">
                                <input disabled type="text" id="serialu" name="serialu" class="form-control input-sm">
                                <span class="input-group-text" id="inputGroup-sizing-default">Serial</span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Factura</span>
                                <input disabled type="text" id="numfacu" name="numfacu" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="input-group mb-3">
                                <input disabled type="text" id="prooveu" name="prooveu" class="form-control input-sm">
                                <span class="input-group-text" id="inputGroup-sizing-default">Proveedor</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Fecha Compra</span>
                                <input disabled type="date" id="feccomu" name="feccomu" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Valor Compra</span>
                                <input disabled type="text" id="valoru" name="valoru" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Descripcion</span>
                                <textarea disabled type="text" id="detallu" name="detallu" class="form-control input-sm" rows="3"></textarea>
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
<!-- Fin Formulario (Editar) -->
