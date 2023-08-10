<?php
$idhistorial = $_GET['idhistorial'];
include "../../models/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT
    h.id_historial    AS idhistorial,
    h.his_añocierre   AS añocierre,
    h.his_escceramicasas AS esccer,
    h.his_porceramicasas AS porcer,
    h.his_impceramicasas AS impcer,
    h.his_celceramicasas AS celcer,
    h.his_escferrecasas  AS escfer,
    h.his_porferrecasas  AS porfer,
    h.his_impferrecasas  AS impfer,
    h.his_celferrecasas  AS celfer,
    h.his_escmetropolis  AS escmet,
    h.his_pormetropolis  AS pormet,
    h.his_impmetropolis  AS impmet,
    h.his_celmetropolis  AS celmet,
    h.his_escmayorista  AS escmay,
    h.his_pormayorista  AS pormay,
    h.his_impmayorista  AS impmay,
    h.his_celmayorista  AS celmay,
    h.his_fecope      AS fecha
FROM hisequipos AS h
WHERE h.id_historial = '$idhistorial'";
$query = mysqli_query($conexion, $sql);
$arrayDetalle = array();

foreach ($query as $row) {
    $arrayDetalle[] = $row;
}
?>
<!-- Formulario (Agregar) -->
    <div class="modal fade" id="cierreaño" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Cierre</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Año Cierre</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Año Cierre</span>
                                    <input type="text" class="form-control input-sm" disabled value="<?php echo $row['añocierre']; ?>">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Conteo</legend>
                        <div class="table-responsive justify-content-center">
                            <table class="table table-light text-center" id="tablainfoventas">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col" ></th>
                                        <th scope="col" >Escritorio</th>
										<th scope="col" >Portatiles</th>
										<th scope="col" >Impresoras</th>
                                        <th scope="col" >Celulares</th>
                                    </tr>
                                </thead>
                                <tbody">
                                <?php
                                    if (count($arrayDetalle) > 0) {
                                        foreach ($arrayDetalle as $c => $value) {
                                            ?>
                                            <tr>
                                                <td class="table-info">CERAMICASAS</td>
                                                <td class="table-warning"><?php echo $value['esccer']; ?></td>
												<td class="table-warning"><?php echo $value['porcer']; ?></td>
												<td class="table-warning"><?php echo $value['impcer']; ?></td>
                                                <td class="table-warning"><?php echo $value['celcer']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="table-info">FERRECASAS</td>
                                                <td class="table-warning"><?php echo $value['escfer']; ?></td>
												<td class="table-warning"><?php echo $value['porfer']; ?></td>
												<td class="table-warning"><?php echo $value['impfer']; ?></td>
                                                <td class="table-warning"><?php echo $value['celfer']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="table-info">METROPOLIS</td>
                                                <td class="table-warning"><?php echo $value['escmet']; ?></td>
												<td class="table-warning"><?php echo $value['pormet']; ?></td>
												<td class="table-warning"><?php echo $value['impmet']; ?></td>
                                                <td class="table-warning"><?php echo $value['celmet']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="table-info">MAYORISTA</td>
                                                <td class="table-warning"><?php echo $value['escmay']; ?></td>
												<td class="table-warning"><?php echo $value['pormay']; ?></td>
												<td class="table-warning"><?php echo $value['impmay']; ?></td>
                                                <td class="table-warning"><?php echo $value['celmay']; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="table-success">TOTAL</td>
                                                <td class="table-success"><?php echo $value['esccer'] + $value['escfer'] + $value['escmet'] + $value['escmay']; ?></td>
												<td class="table-success"><?php echo $value['porcer'] + $value['porfer'] + $value['pormet'] + $value['pormay']; ?></td>
												<td class="table-success"><?php echo $value['impcer'] + $value['impfer'] + $value['impmet'] + $value['impmay']; ?></td>
                                                <td class="table-success"><?php echo $value['celcer'] + $value['celfer'] + $value['celmet'] + $value['celmay']; ?></td>
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
                    <!-- <div class="card-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal">Imprimir</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
<!-- Fin Formulario (Agregar, Modificar) -->
