<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        t.id_tarea    AS idtarea,
        t.id_usuario  AS idusuario,
        t.id_nivel    AS idnivel,
        t.id_asignado AS idasignado,
        t.tar_detalle AS detalle,
        t.tar_fecope  AS fecope,
        t.tar_fecupt  AS fecupt,
        t.tar_fecrea  AS fecrea,
        t.tar_estado  AS estado
    FROM tareas AS t
    WHERE t.id_usuario = '$idusuario'";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >DETALLE</th>
                <th scope="col" >NIVEL</th>
                <th scope="col" >ASIGNADO</th>
                <th scope="col" >FECHA INI</th>
                <th scope="col" >FECHA FIN</th>
                <th scope="col" >ESTADO</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
