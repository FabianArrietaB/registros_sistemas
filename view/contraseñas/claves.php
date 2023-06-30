<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        c.id_clave   AS idclave,
        c.id_tipo    AS idtipo,
        c.cla_equip  AS equipo,
        c.cla_user   AS usuario,
        c.cla_nomwif AS nonwif,
        c.cla_clawif AS calwif,
        c.cla_ip     AS ip,
        c.cla_marca  AS marca,
        c.cla_modelo AS modelo,
        c.cla_patron AS patron,
        c.cla_serial AS serial
        FROM clave AS c";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >TIPO EQUIPO</th>
                <th scope="col" >NOMBRE EQUIPO</th>
                <th scope="col" >SERIAL</th>
                <th scope="col" >USUARIO</th>
                <th scope="col" >CONTRASEÑA</th>
                <th scope="col" >MODELO</th>
                <th scope="col" >MARCA</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($tareas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $tareas['idtipo'];?></td>
                <td><?php echo $tareas['equipo'];?></td>
                <td><?php echo $tareas['serial'];?></td>
                <td><?php echo $tareas['usuario'];?></td>
                <td><?php echo $tareas['serial'];?></td>
                <td>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
