<!-- Vista Admin-->
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
                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3)"); $sql= mysqli_num_rows($sql); echo $sql;
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
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION POR SEDE</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student">
                    <!-- EQUIPOS MAYORISTA -->
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-header text-center">
                                <div class="title">
                                    <h2>MAYORISTA</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Equipos</span>
                                        <input type="text" class="form-control" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Portatiles</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Escritorio</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Impresoras</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EQUIPOS METROPOLIS -->
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-header text-center">
                                <div class="title">
                                    <h2>METROPOLIS</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Equipos</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Portatiles</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Escritorio</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Impresoras</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 3"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EQUIPOS FERRECASAS -->
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-header text-center">
                                <div class="title">
                                    <h2>FERRECASAS</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Equipos</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Portatiles</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Escritorio</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Impresoras</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 2"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- EQUIPOS CERAMICASAS -->
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="card-header text-center">
                                <div class="title">
                                    <h2>FERRECASAS</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Equipos</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ IN (1, 2, 3) AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Portatiles</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Escritorio</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Impresoras</span>
                                        <input type="text" class="form-control input-sm" disabled value="
                                        <?php
                                            $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                        ?>
                                        ">
                                    </div>
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
<!-- Vista Supervisor -->
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
<?php } else if($_SESSION['usuario']['rol'] == 2) {
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
                    <!-- Numero Equipos -->
                    <div class="col-sm-2">
                        <div class="card border-warning text-white bg-danger mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
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
        <div class="card border-primary">
            <div class="card-header text-center">
                <div class="title">
                    <h2>INFORMACION POR SEDE</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row student text-center" style="align-items: center;">
                    <!-- Numero Equipos Mayorista-->
                    <div class="col-sm-3">
                        <div class="card border-danger text-white bg-danger  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Equipos Mayorista</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Equipos Metropolis -->
                    <div class="col-sm-3">
                        <div class="card border-danger text-white bg-danger  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Equipos Mayorista</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Equipos Ferrecasas -->
                    <div class="col-sm-3">
                        <div class="card border-danger text-white bg-danger  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Equipos Ferrecasas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Equipos Ceramicasas -->
                    <div class="col-sm-3">
                        <div class="card border-danger text-white bg-danger mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="float-sm-right">Total de Equipos Ceramicasas</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row student text-center" style="align-items: center;">
                    <!-- Numero Portatiles Metropolis -->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-warning  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Escritorio Metropolis-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-primary  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="float-sm-right">&nbsp;
                                        <span style="font-size: 20px">
                                            <?php
                                                $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                            ?>
                                        </span>
                                    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Impresoras Metropolis-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 4"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Portatiles Mayorista -->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-warning  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Escritorio Mayorista-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-primary  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="float-sm-right">&nbsp;
                                        <span style="font-size: 20px">
                                            <?php
                                                $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                            ?>
                                        </span>
                                    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Impresoras Mayorista-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Portatiles Ferrecasas -->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-warning  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Escritorio Ferrecasas-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-primary  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="float-sm-right">&nbsp;
                                        <span style="font-size: 20px">
                                            <?php
                                                $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                            ?>
                                        </span>
                                    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Impresoras Ferrecasas-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Portatiles Ferrecasas -->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-warning  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 1 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Escritorio Ferrecasas-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-primary  mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12">
                                    </div>
                                    <div class="col-sm-4">
                                    <div class="float-sm-right">&nbsp;
                                        <span style="font-size: 20px">
                                            <?php
                                                $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 2 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                            ?>
                                        </span>
                                    </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Numero Impresoras Ferrecasas-->
                    <div class="col-sm-1">
                        <div class="card border-danger text-white bg-success mb-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="float-sm-right">&nbsp;
                                            <span style="font-size: 20px">
                                                <?php
                                                    $sql=$conexion->query("SELECT * FROM equipos WHERE id_tipequ = 3 AND id_sede = 1"); $sql= mysqli_num_rows($sql); echo $sql;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
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
<?php }else{
        header("../index.php");
    }
?>