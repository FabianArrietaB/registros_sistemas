<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        b.bit_tipeve as evento,
        b.bit_fecope as fecha,
        b.bit_operador as operador,
        u.user_nombre as nombre,
        b.bit_modulo as modulo,
        b.bit_idsede as idsede,
        s.sed_nombre as sede,
        b.bit_detall as detall
    FROM bitacora AS b
    INNER JOIN usuarios AS u ON u.id_usuario = b.bit_operador
    LEFT JOIN sedes AS s ON s.id_sede = b.bit_idsede
    ORDER BY b.id_bitacora DESC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >OBSERVACION</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($bitacora = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td>
                    <?php echo 'El ' . $bitacora['fecha'] . ' por el usuario ' . $bitacora['nombre'] . ' se ' . $bitacora['evento'] . ' ' . $bitacora['detall'] . ' por el modulo ' . $bitacora['modulo']; ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
