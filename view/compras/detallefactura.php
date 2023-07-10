<?php
$numfac = $_GET['numfac'];
include "../../models/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
v.id_venta   as idventa,
v.ven_numfac as numfac,
v.ven_cantid  as cantid,
CONCAT(v.ven_nompro,' ',v.ven_marca,' ',v.ven_modelo) as produc,
v.ven_serial  as serial,
v.ven_valor  as valor,
v.ven_proove as proove,
v.ven_feccom as feccom
FROM ventas AS v
WHERE v.ven_numfac = '$numfac'";
$query = mysqli_query($conexion, $sql);
$arrayDetalle = array();

$sqlvalor = "SELECT
SUM(v.ven_valor)  as valortotal
FROM ventas AS v
WHERE v.ven_numfac = '$numfac'";
$rwvalor = mysqli_query($conexion, $sqlvalor);
$valortotal = mysqli_fetch_array($rwvalor);

foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
    <div class="modal fade" id="repfactura" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Factura</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Factura</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Numero Factura</span>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo $numfac; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Fecha Compra</span>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo $row['feccom']; ?>">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Valor Total</span>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo number_format($valortotal['valortotal'],2); ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Facturas</legend>
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center" id="tablainfoventas">
                                <thead>
                                    <tr>
                                        <th scope="col" >Cantidad</th>
                                        <th scope="col" >Descripcion</th>
                                        <th scope="col" >Valor Unidad</th>
                                        <th scope="col" >Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['cantid']; ?></td>
                                                <td><?php echo $value['produc']; ?></td>
                                                <td><?php echo '$ '. number_format(round($value['valor'] / $value['cantid']),2); ?></td>
                                                <td><?php echo '$ '. number_format($value['valor'],2); ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: center">
                                                <div class="alert alert-danger" role="alert">
                                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                    <span class="sr-only">Error:</span>
                                                    No existen Datos
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                    <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Imprimir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Fin Formulario (Agregar, Modificar) -->
