<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        h.id_historial    AS idhistorial,
        h.his_añocierre   AS añocierre,
        h.his_escritorio  AS escritorio,
        h.his_portatiles  AS portatiles,
        h.his_impresoras  AS impresoras,
        h.his_celulares   AS celulares,
        h.his_fecope      AS fecha
    FROM hisequipos AS h";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >AÑO CIERRE</th>
                <th scope="col" >ESCRITORIO</th>
                <th scope="col" >PORTATILES</th>
                <th scope="col" >IMPRESORAS</th>
                <th scope="col" >CELULARES</th>
                <th scope="col" >FECHA OPERACION</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($tareas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $tareas['añocierre'];?></td>
                <td><?php echo $tareas['escritorio'];?></td>
                <td><?php echo $tareas['portatiles'];  ?></td>
                <td><?php echo $tareas['impresoras'];  ?></td>
                <td><?php echo $tareas['celulares'];  ?></td>
                <td><?php echo $tareas['fecha'];  ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
