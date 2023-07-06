<!-- inicio Tabla -->
<?php
    session_start();
    include "../../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion(); // Conectar a la BD
    $conexion = $con->conectar();
    $sql = "SELECT
    YEAR(v.ven_feccom) as año,
    MONTH(v.ven_feccom) as mes,
    v.ven_valor as valor,
    SUM(v.ven_valor) as valtot
    from ventas as v
    GROUP BY mes"; // Consulta SQL
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="card-body">
    <div class="row student text-center" style="align-items: center;">
        <!-- Valor Ventas -->
        <div class="col-sm-3">
            <div class="card border-danger text-white bg-primary mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                        </div>
                        <div class="col-sm-8">
                            <div class="float-sm-right">&nbsp;
                                <span style="font-size: 20px">
                                    <?php
                                        $sql=$conexion->query("SELECT SUM(ven_valor) as 'precio' from ventas");
                                        $data = mysqli_fetch_array($sql);
                                        $precio = $data['precio'];
                                        echo '$ '. $precio;
                                    ?>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="float-sm-right">Total Gastos</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Presupuesto -->
        <div class="col-sm-3">
            <div class="card border-danger text-white bg-info mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="float-sm-right">&nbsp;
                                <span style="font-size: 20px">
                                    <?php
                                        $sql=$conexion->query("SELECT pre_valor as 'valor' from presupuesto where MONTH(pre_fecope) = MONTH(CURRENT_DATE())");
                                        $data = mysqli_fetch_array($sql);
                                        if ($data == 0) {
                                            echo 'No hay presupuesto';
                                        } else {
                                            $valor = $data['valor'];
                                            echo '$ '. $valor;
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                        </div>
                        <div class="float-sm-right">Presupuesto Mes</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Valor Ventas -->
        <div class="col-sm-3">
            <div class="card border-danger text-white bg-warning mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="float-sm-right">&nbsp;
                                <span style="font-size: 20px">
                                    <?php
                                        $sql=$conexion->query("SELECT SUM(ven_valor) as 'precio' from ventas where MONTH(ven_feccom) = MONTH(CURRENT_DATE()) ");
                                        $data = mysqli_fetch_array($sql);
                                        if ($data == 0) {
                                            echo 'No hay Gastos';
                                        } else {
                                        $precio = $data['precio'];
                                        echo '$ '. $precio;
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                        </div>
                        <div class="float-sm-right">Total Gastos Mes Actual</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Diferencia -->
        <div class="col-sm-3">
            <div class="card border-danger text-white bg-danger mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="float-sm-right">&nbsp;
                                <span style="font-size: 20px">
                                    <?php
                                        $sql=$conexion->query("SELECT SUM(ven_valor) as 'precio' from ventas where MONTH(ven_feccom) = MONTH(CURRENT_DATE()) ");
                                        $data = mysqli_fetch_array($sql);
                                        $precio = $data['precio'];
                                        $sql=$conexion->query("SELECT pre_valor as 'valor' from presupuesto where MONTH(pre_fecope) = MONTH(CURRENT_DATE())");
                                        $data = mysqli_fetch_array($sql);
                                        if ($data == 0) {
                                            echo 'No hay presupuesto';
                                        } else {
                                            $valor = $data['valor'];
                                            echo '$ '. $valor - $precio;
                                        }
                                    ?>
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-sm-4">
                            <i class="fa-solid fa-sack-dollar fa-3x"></i>
                        </div>
                        <div class="float-sm-right">Restante</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <div class="card border-primary">
            <div class="card-header bg-success text-center text-white">
                <div class="row">
                    <div class="col-12">
                        <h4>Gastos Por Mes</h4>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-light text-center">
                    <thead>
                        <tr>
                            <th scope="col">AÑOS</th>
                            <th scope="col">MES</th>
                            <th scope="col">VALOR</th>
                            <th scope="col">
                            <?php if($_SESSION['usuario']['rol'] == 4) {?>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addpresupuesto"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                                </div>
                            <?php } ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($ventas = mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $ventas['año']; ?></td>
                            <td>
                            <?php if ($ventas['mes'] == 1) { ?>
                                <h5><span >Enero</span></h5>
                            <?php } else if ($ventas['mes'] == 2) { ?>
                                <h5><span >Febrero</span></h5>
                                <?php } else if ($ventas['mes'] == 3) { ?>
                                <h5><span >Marzo</span></h5>
                                <?php } else if ($ventas['mes'] == 4) { ?>
                                <h5><span >Abril</span></h5>
                                <?php } else if ($ventas['mes'] == 5) { ?>
                                <h5><span >Mayo</span></h5>
                                <?php } else if ($ventas['mes'] == 6) { ?>
                                <h5><span >Junio</span></h5>
                                <?php } else if ($ventas['mes'] == 7) { ?>
                                <h5><span >Julio</span></h5>
                                <?php } else if ($ventas['mes'] == 8) { ?>
                                <h5><span >Agosto</span></h5>
                                <?php } else if ($ventas['mes'] == 9) { ?>
                                <h5><span >Septiembre</span></h5>
                                <?php } else if ($ventas['mes'] == 10) { ?>
                                <h5><span >Octubre</span></h5>
                                <?php } else if ($ventas['mes'] == 11) { ?>
                                <h5><span >Noviembre</span></h5>
                                <?php } else if ($ventas['mes'] == 12) { ?>
                                <h5><span >Diciembre</span></h5>
                            <?php } ?>
                            </td>
                            <td><?php echo '$ '. $ventas['valtot']; ?></td>
                            <td>
                                <div class="d-grid gap-2">
                                    <input type="button" class="btn btn-info" value="Reporte" onclick="detallecompras('<?php echo $ventas['mes']?>')"></input>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- fin de la tabla -->