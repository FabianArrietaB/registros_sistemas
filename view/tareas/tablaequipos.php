<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        h.id_historial    AS idhistorial,
        h.his_añocierre   AS añocierre,
        h.his_escceramicasas AS esccer,
        h.his_porceramicasas AS porcer,
        h.his_impceramicasas AS impcer,
        h.his_celceramicasas AS celcer,
        h.his_escferrecasas  AS escfer,
        h.his_porferrecasas  AS porfer,
        h.his_impferrecasas  AS impfer,
        h.his_celferrecasas  AS celfer,
        h.his_escmetropolis  AS escmet,
        h.his_pormetropolis  AS pormet,
        h.his_impmetropolis  AS impmet,
        h.his_celmetropolis  AS celmet,
        h.his_escmayorista  AS escmay,
        h.his_pormayorista  AS pormay,
        h.his_impmayorista  AS impmay,
        h.his_celmayorista  AS celmay,
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
            while ($equipos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td onclick="detalleaño('<?php echo $equipos['idhistorial']?>')"><?php echo $equipos['añocierre'];?></td>
                <td><?php echo $equipos['esccer'] + $equipos['escfer'] + $equipos['escmet'] + $equipos['escmay'];?></td>
                <td><?php echo $equipos['porcer'] + $equipos['porfer'] + $equipos['pormet'] + $equipos['pormay'];?></td>
                <td><?php echo $equipos['impcer'] + $equipos['impfer'] + $equipos['impmet'] + $equipos['impmay'];?></td>
                <td><?php echo $equipos['celcer'] + $equipos['celfer'] + $equipos['celmet'] + $equipos['celmay'];?></td>
                <td><?php echo $equipos['fecha'];  ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
