<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="row">
    <div class="col-12">
        <div class="card-header text-center">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h2>EVENTOS DEL SISTEMA</h2>
                    </div>
                </div>
            </div>
            <form method="get">
                <div class="row">
                    <div class="col-5">
                        <div class="input-group mb-3">
                            <input class="form-control me-3" type="search" onkeyup="filtrar()" placeholder="Buscar" id="filtro" name="filtro">
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
        <div class="card-body">
            <div id="tablaprocesos"></div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/bitacora.js"></script>
<?php
}
?>