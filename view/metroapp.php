<!-- Vista Admin y Supervisor -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-primary">
                <div class="card-header text-center">
                    <div class="row">
                    <div class="col-8">
                        <div class="title">
                            <h2>USUARIOS METROAPP</h2>
                        </div>
                    </div>
                </div>
                    <form method="GET">
                        <input class="form-control me-3" type="search" placeholder="Buscar" id="filtro" name="filtro">
                    </form>
                </div>
                <div class="card-body">
                    <div id="tablalistapermisos"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/usuarios/metroapp.js"></script>
<?php
}
?>