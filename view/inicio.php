<!-- Vista Admin-->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 4 ||
    $_SESSION['usuario']['rol'] == 2){
    include "../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="page-content">
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION GENERAL</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center" style="align-items: center;">
                    <div class="col-3">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Total Equipos</span>
                                <input type="text" class="form-control input-sm" disabled value="
                                <?php
                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3)");
                                    $sql= mysqli_num_rows($sql);
                                    echo $sql;
                                ?>
                                ">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Potatiles</span>
                                <input type="text" class="form-control input-sm" disabled value="
                                <?php
                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                ?>
                                ">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Escritorio</span>
                                <input type="text" class="form-control input-sm" disabled value="
                                <?php
                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                ?>
                                ">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Impresoras</span>
                                <input type="text" class="form-control input-sm" disabled value="
                                <?php
                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                ?>
                                ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--INFORMACION POR SEDE -->
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION POR SEDE</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center">
                    <div class="col-3">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action active">MAYORISTA</li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos</div>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Portatiles</div>
                                </div>
                                <span class="badge bg-warning rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos Escritorio</div>
                                </div>
                                <span class="badge bg-success rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Impresoras</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action active">METROPOLIS</li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos</div>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Portatiles</div>
                                </div>
                                <span class="badge bg-warning rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos Escritorio</div>
                                </div>
                                <span class="badge bg-success rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Impresoras</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action active">FERRECASAS</li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos</div>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Portatiles</div>
                                </div>
                                <span class="badge bg-warning rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos Escritorio</div>
                                </div>
                                <span class="badge bg-success rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Impresoras</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="list-group">
                            <li class="list-group-item list-group-item-action active">CERAMICASAS</li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos</div>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Portatiles</div>
                                </div>
                                <span class="badge bg-warning rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Equipos Escritorio</div>
                                </div>
                                <span class="badge bg-success rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                <div class="fw-bold">Total Impresoras</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <?php
                                        $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                    ?>
                                </span>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--INFORMACION CIERRE AÑO -->
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-10">
                        <div class="title">
                            <h2>EQUIPOS AL CIERRE AÑO</h2>
                        </div>
                    </div>
                    <?php if($_SESSION['usuario']['rol'] == 4) {?>
                    <div class="col-2">
                        <div class="d-grid gap-2">
                            <input type="button" class="btn btn-danger" onclick="cierremes()" value="CIERRE AÑO">
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center">
                    <div id="tablacierreequipos"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="conte-modal-cierre"></div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/tareas.js"></script>
<!-- Vista Supervisor -->
<?php } else if ($_SESSION['usuario']['rol'] == 3) {
include "../models/conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
    <div class="page-content">
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-grid gap-2">
                            <button class="btn btn-lg btn-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#creartarea">
                                <div class="row">
                                    <div class="col-3 text-center">
                                    </div>
                                    <div class="col-9 text-center pt-1"><strong>CREAR NUEVA TAREA</strong></div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-12">
                        <h4>TAREAS ASIGNADAS</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="tablalistatareas"></div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "tareas/nuevatarea.php";
include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/tareas.js"></script>

<!-- por ultimo se carga el footer -->
<?php
    include "footer.php";
?>
<?php }else{
        header("../index.php");
    }
?>