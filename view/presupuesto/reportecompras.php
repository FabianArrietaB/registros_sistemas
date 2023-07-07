<?php
$idmes = $_GET['date'];
include "../../models/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
v.id_venta   as idventa,
v.ven_numfac as numfac,
v.ven_valor  as valor,
v.ven_proove as proove,
v.ven_feccom as feccom
FROM ventas AS v
WHERE MONTH(v.ven_feccom) = '$idmes'
GROUP BY v.ven_numfac";
if ($idmes == 1) {
    $mes = 'ENERO';
} else if ($idmes == 2) {
    $mes = 'FEBRERO';
} else if ($idmes == 3) {
    $mes = 'MARZO';
} else if ($idmes == 4) {
    $mes = 'ABRIL';
} else if ($idmes == 5) {
    $mes = 'MAYO';
} else if ($idmes == 6) {
    $mes = 'JUNIO';
} else if ($idmes == 7) {
    $mes = 'JULIO';
} else if ($idmes == 8) {
    $mes = 'AGOSTO';
} else if ($idmes == 9) {
    $mes = 'SEPTIEMBRE';
} else if ($idmes == 10) {
    $mes = 'OCTUBRE';
} else if ($idmes == 11) {
    $mes = 'NOVIEMBRE';
} else if ($idmes == 12) {
    $mes = 'DICIEMBRE';
}
$query = mysqli_query($conexion, $sql);
$arrayDetalle = array();

$sqlvalor = "SELECT
SUM(v.ven_valor)  as valortotal,
v.ven_feccom as feccom
FROM ventas AS v
WHERE MONTH(v.ven_feccom) = '$idmes'";
$rwvalor = mysqli_query($conexion, $sqlvalor);
$valortotal = mysqli_fetch_array($rwvalor);

foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
    <div class="modal fade" id="repcompras" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reporte Compras</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Gastos</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Mes</label>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo $mes; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Valor Total</label>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo '$ '. number_format($valortotal['valortotal'],2); ?>">
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
                                        <th scope="col" >Factura</th>
                                        <th scope="col" >Proovedor</th>
                                        <th scope="col" >Fecha</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $value['numfac']; ?></td>
                                                <td><?php echo $value['proove']; ?></td>
                                                <td><?php echo $value['feccom']; ?></td>
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
