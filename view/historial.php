<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 2||
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion(); // Conectar a la BD
    $conexion = $con->conectar();
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
                <form method="get">
                            <div class="row">
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <input class="form-control me-3" type="search" onkeyup="filtrar()" placeholder="Buscar" id="filtro" name="filtro">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Año</span>
                                        <select name="year" id="year" class="form-control input-sm">
                                            <option value="">Seleccione</option>
                                            <?php
                                            $sql="SELECT DISTINCT YEAR(v.ven_feccom) as año FROM ventas as v";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($año = mysqli_fetch_array($respuesta)) {
                                            ?>
                                                <option value="<?php echo $año['año']?>"><?php echo $año['año'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha Inicio</span>
                                        <input type="date" id="fec_ini" name="fec_ini" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha Final</span>
                                        <input type="date" id="fec_fin" name="fec_fin" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="d-grid gap-2">
                                        <div class="input-group mb-3">
                                            <button type="submit" class="btn btn-primary">Filtrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
            <div id="tablapresupuesto"></div>
        </div>
    </div>
</div>
<div id="conte-modal-compras"></div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "presupuesto/addpresupuesto.php";
require('footer.php');
?>
<!-- carga ficheros javascript -->
<script src="../public/js/historial.js"></script>
<?php
    }else{
        header("location:../index.php");
    }
?>