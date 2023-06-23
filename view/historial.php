<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 2||
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $con = new Conexion(); // Conectar a la BD
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
    MONTH(v.ven_feccom) as date,
    v.ven_valor as valor,
    SUM(v.ven_valor) as valtot
    from ventas as v
    GROUP BY date"; // Consulta SQL
    $query = mysqli_query($conexion, $sql); // Ejecutar la consulta SQL
    // $data = array(); // Array donde vamos a guardar los datos
    // while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    //     $data[]=$r; // Guardar los resultados en la variable $data
    // }
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="page-content">
        <div class="card border-primary">
            <div class="card-header bg-success text-center text-white">
                <div class="row">
                    <div class="col-12">
                        <h4>Gastos Totales</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center" style="align-items: center;">
                    <!-- Valor Ventas -->
                    <div class="col-sm-6">
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
                    <!-- Valor Ventas -->
                    <div class="col-sm-6">
                        <div class="card border-danger text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT SUM(ven_valor) as 'precio' from ventas where MONTH(ven_feccom) = MONTH(CURRENT_DATE()) ");
                                                    $data = mysqli_fetch_array($sql);
                                                    $precio = $data['precio'];
                                                    echo '$ '. $precio;
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
                <div class="card-body">
                    <div class="row student text-center" style="align-items: center;">
                        <div class="col-12">
                            <div class="card border-primary">
                                <!-- inicio Tabla -->
                                <div class="table-responsive">
                                    <table class="table table-light text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">MES</th>
                                                <th scope="col">VALOR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while ($ventas = mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <td>
                                                <?php if ($ventas['date'] == 1) { ?>
                                                    <h5><span >Enero</span></h5>
                                                <?php } else if ($ventas['date'] == 2) { ?>
                                                    <h5><span >Febrero</span></h5>
                                                    <?php } else if ($ventas['date'] == 3) { ?>
                                                    <h5><span >Marzo</span></h5>
                                                    <?php } else if ($ventas['date'] == 4) { ?>
                                                    <h5><span >Abril</span></h5>
                                                    <?php } else if ($ventas['date'] == 5) { ?>
                                                    <h5><span >Mayo</span></h5>
                                                    <?php } else if ($ventas['date'] == 6) { ?>
                                                    <h5><span >Junio</span></h5>
                                                    <?php } else if ($ventas['date'] == 7) { ?>
                                                    <h5><span >Julio</span></h5>
                                                    <?php } else if ($ventas['date'] == 8) { ?>
                                                    <h5><span >Agosto</span></h5>
                                                    <?php } else if ($ventas['date'] == 9) { ?>
                                                    <h5><span >Septiembre</span></h5>
                                                    <?php } else if ($ventas['date'] == 10) { ?>
                                                    <h5><span >Octubre</span></h5>
                                                    <?php } else if ($ventas['date'] == 11) { ?>
                                                    <h5><span >Noviembre</span></h5>
                                                    <?php } else if ($ventas['date'] == 12) { ?>
                                                    <h5><span >Diciembre</span></h5>
                                                <?php } ?>
                                                </td>
                                                <td><?php echo '$ '. $ventas['valtot']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- fin de la tabla -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
require('footer.php');
?>
<!-- carga ficheros javascript -->
<script src="../public/js/historial.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>