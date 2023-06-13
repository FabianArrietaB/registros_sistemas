<!-- Vista Admin y Supervisro -->
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
    <div class="page-content">
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student" style="align-items: center;">
                    <!-- Numero Equipos -->
                    <div class="col-sm-2">
                        <div class="card border-warning text-white bg-danger mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <i class="fa-solid fa-microchip fa-3x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Equipos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Portatiles -->
                    <div class="col-sm-2">
                        <div class="card border-danger text-white bg-warning mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <i class="fa-solid fa-laptop fa-3x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Portatiles</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Escritorio -->
                    <div class="col-sm-2">
                        <div class="card border-success text-white bg-primary mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <i class="fa-solid fa-desktop fa-3x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Escritorio</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Impresoras -->
                    <div class="col-sm-2">
                        <div class="card border-info text-white bg-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <i class="fa-solid fa-print fa-3x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Impresoras</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Usuarios -->
                    <div class="col-sm-2">
                        <div class="card border-info text-white bg-dark mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                    <i class="fa fa-user fa-3x"></i>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM usuarios WHERE user_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql; 
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Usuarios</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Usuarios -->
                    <div class="col-sm-2">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <i class="fa fa-users fa-3x"></i>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM personas WHERE per_estado = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Personas</div>
                                </div>
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
    include "footer.php";
?>
<!-- carga ficheros javascript -->
<script src="../public/js/tareas.js"></script>
<!-- Vista Alumno -->
<?php } else if($_SESSION['usuario']['rol'] == 3) {
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
                        <button class="btn btn-lg btn-success btn-block mb-3" data-bs-toggle="modal" data-bs-target="#creartarea">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <i class="fa-solid fa-notes-medical fa-2x"></i>
                                </div>
                                <div class="col-9 text-center pt-1"><strong>CREAR REPORTE</strong></div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-12">
                        <h4>Mis Reportes</h4>
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
<?php }else{
        header("../index.php");
    }
?>