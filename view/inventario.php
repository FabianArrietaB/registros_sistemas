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
                        <div class="col-5">
                            <div class="title">
                                <h2>INVENTARIO FOMPLUS</h2>
                            </div>
                        </div>
                        <div class="col-5">
                            <form action="#" id="form_file" enctype="multipart/form-data">
                                <div class="input-group">
                                    <input accept=".csv,.xlsx,.xls" id="productos" name="productos" type="file" class="form-control" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button onclick="importarproductos()" class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Cargar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-2">
                            <a href="precios.php" class="btn btn-outline-primary" type="button">Precios</a>
                        </div>
                    </div>
                    <form method="GET">
                        <input class="form-control me-3" type="search" placeholder="Buscar" id="filtro" name="filtro">
                    </form>
                    <div class="card-body">
                        <div id="tblproductos"></div>
                    </div>
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
<script src="../public/js/inventarios.js"></script>
<?php
}
?>