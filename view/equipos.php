<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3 ||
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="row">
    <div class="col-12">
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-12">
                        <div class="title">
                            <h2>LISTA EQUIPOS</h2>
                        </div>
                    </div>
                </div>
                <form method="get">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input class="form-control me-3" type="search" onkeyup="filtrar()" placeholder="Buscar" id="filtro" name="filtro">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div id="tablaequipos"></div>
            </div>
        </div>
    </div>
</div>
<div id="conte-modal-facturas"></div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "../view/mantenimientos/agregaractivo.php";
    include "../view/mantenimientos/agregarcelular.php";
    include "../view/mantenimientos/editarequipo.php";
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/mantenimientos.js"></script>
<?php
}
?>