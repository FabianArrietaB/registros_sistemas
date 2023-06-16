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
    WHERE t.tar_estado = 0 OR t.tar_estado = 1 ";
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
                <th scope="col" >ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($tareas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $tareas['detalle'];?></td>
                <td>
                <?php if ($tareas['idnivel'] == 1) { ?>
                    <h5><span class="badge text-bg-success">BASICO</span></h5>
                <?php } else if ($tareas['idnivel'] == 2) { ?>
                    <h5><span class="badge text-bg-warning">MEDIO</span></h5>
                <?php } else if ($tareas['idnivel'] == 3) { ?>
                    <h5><span class="badge text-bg-danger">URGENTE</span></h5>
                <?php } ?>
                </td>
                <td>
                <?php if ($tareas['idasignado'] == 1) { ?>
                    <h5><span >Fabian</span></h5>
                <?php } else if ($tareas['idasignado'] == 2) { ?>
                    <h5><span >Jesus</span></h5>
                <?php } else if ($tareas['idasignado'] == 3) { ?>
                    <h5><span >Todos</span></h5>
                <?php } ?>
                </td>
                <td><?php echo $tareas['fecope'];  ?></td>
                <td><?php echo $tareas['fecrea'];  ?></td>
                <td>
                <?php if ($tareas['estado'] == 0) { ?>
                    <h5><span class="badge text-bg-danger">ABIERTO</span></h5>
                <?php } else if ($tareas['estado'] == 1) { ?>
                    <h5><span class="badge text-bg-warning">OPERACION</span></h5>
                <?php } else if ($tareas['estado'] == 2) { ?>
                    <h5><span class="badge text-bg-success">FINALIZADA</span></h5>
                <?php } ?>
                </td>
                <td>
                <?php if ($tareas['estado'] == 0) { ?> <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editartarea" onclick="detalletarea('<?php echo $tareas['idtarea']?>')"><i class="fa-solid fa-check-to-slot fa-2x"></i></button> <?php } ?>
                    <?php if ($tareas['estado'] == 1) { ?> <button type="button" class="btn btn-success" onclick="finalizada(<?php echo $tareas['idtarea'] ?>, <?php echo $tareas['estado'] ?>)"><i class="fa-solid fa-check-to-slot fa-2x"></i></button> <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
