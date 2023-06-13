<!-- Vista Admin y Supervisro -->
<?php
    include "header.php";
    include "navbar.php";
    if(isset($_SESSION['usuario']) &&
    $_SESSION['usuario']['rol'] == 3||
    $_SESSION['usuario']['rol'] == 4){
    include "../models/conexion.php";
    $idusuario = $_SESSION['usuario']['id'];
    $con = new Conexion();
    $conexion = $con->conectar();
?>
<!-- inicio del contenido principal -->
<div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header bg-success text-center text-white">
                    <div class="row">
                        <div class="col-12">
                            <h4>TAREAS</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 text-center"">
                            <a class="acard" type="button" id="pendientesbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <i class="fa-solid fa-list-ol fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Tareas Pendientes</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 text-center"">
                            <a class="acard" type="button" id="finalizadasbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <i class="fa-solid fa-list-check fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Tareas Finalizadas</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div id="tareaspendientes"></div>
                        <div id="tareasfinalizadas"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "tareas/soluciontarea.php";
require('footer.php');
?>
<!-- carga ficheros javascript -->
<script src="../public/js/tareas.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>