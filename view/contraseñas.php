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
<div class="container-fluid">
        <div class="page-content">
            <div class="card border-primary">
                <div class="card-header bg-success text-center text-white">
                    <div class="row">
                        <div class="col-12">
                            <h4>CLAVES Y CORREOS</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="correosbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <i class="fa-solid fa-envelope fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Correos</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="carpetasbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <i class="fa-solid fa-folder fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Carpetas</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="credencialbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <i class="fa-solid fa-key fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Credenciales</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 text-center">
                            <a class="acard" type="button" id="clavesbtn">
                                <div class="card border-danger text-white bg-primary mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <i class="fa-solid fa-lock fa-3x"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-sm-right">Claves</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div id="listacorreos"></div>
                        <div id="listafolders"></div>
                        <div id="listacredenciales"></div>
                        <div id="listaclaves"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin del contenido principal -->
<!-- por ultimo se carga el footer -->
<?php
include "contraseñas/editarclave.php";
include "contraseñas/editarfolder.php";
include "contraseñas/editarcorreo.php";
include "contraseñas/editarcredencial.php";
include "contraseñas/newclave.php";
include "contraseñas/newfolder.php";
include "contraseñas/newcorreo.php";
include "contraseñas/newcredencial.php";
require('footer.php');
?>
<!-- carga ficheros javascript -->
<script src="../public/js/contraseñas.js"></script>

<?php
    }else{
        header("location:../index.php");
    }
?>