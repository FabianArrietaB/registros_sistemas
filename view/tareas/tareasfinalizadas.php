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
    WHERE t.id_usuario = '$idusuario'
    AND t.id_asignado = 4
    AND t.tar_estado = 1 ";
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
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($equipos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $equipos['detalle'];?></td>
                <td><?php echo $equipos['idnivel']; ?></td>
                <td><?php echo $equipos['idasignado']; ?></td>
                <td><?php echo $equipos['fecope'];  ?></td>
                <td><?php echo $equipos['fecrea'];  ?></td>
                <td><?php echo $equipos['estado'];  ?></td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarequipo" onclick="detalleequipo('<?php echo $equipos['idequipo']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#codactivo" onclick="detalleequipo('<?php echo $equipos['idequipo']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
