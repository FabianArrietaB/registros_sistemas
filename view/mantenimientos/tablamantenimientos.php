<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        m.id_mantenimiento AS idmantenimiento,
        m.id_operador AS idoperador,
        u.user_nombre AS operador,
        m.id_area       AS idarea,
        a.are_nombre    AS area,
        m.id_equipo  AS idequipo,
        CONCAT(e.equ_marca, ' - ' ,e.equ_modelo) AS equipo,
        e.equ_codact  AS codigo,
        m.id_usuario AS usuario,
        p.per_nombre AS persona,
        m.mat_detalle AS detalle,
        m.mat_fecope AS fecha
        FROM mantenimientos AS m
        INNER JOIN areas AS a ON a.id_area = m.id_area
        INNER JOIN equipos AS e ON e.id_equipo = m.id_equipo
        INNER JOIN usuarios AS u ON u.id_usuario = m.id_operador
        INNER JOIN personas AS p ON m.id_usuario = p.id_persona";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >AREA</th>
                <th scope="col" >PERSONA</th>
                <th scope="col" >EQUIPO</th>
                <th scope="col" >CODIGO ACTIVO</th>
                <th scope="col" >DETALLE</th>
                <th scope="col" >FECHA</th>
                <th scope="col" >OPERADOR</th>
                <th>
                <?php if($_SESSION['usuario']['rol'] == 4) {?>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addmantenimiento"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                    </div>
                <?php } ?>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($equipos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $equipos['area'];?></td>
                <td><?php echo $equipos['persona']; ?></td>
                <td data-bs-toggle="modal" data-bs-target="#detalleequi" onclick="detalleequipo('<?php echo $equipos['idequipo']?>')"><?php echo $equipos['equipo']; ?></td>
                <td><?php echo $equipos['codigo'];    ?></td>
                <td><?php echo $equipos['detalle']; ?></td>
                <td><?php echo $equipos['fecha'];    ?></td>
                <td><?php echo $equipos['operador'];  ?></td>
                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
