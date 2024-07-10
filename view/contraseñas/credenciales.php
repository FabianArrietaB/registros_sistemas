<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        c.id_credencial AS idcredencial,
        c.cre_dominio   AS dominio,
        c.cre_usuario   AS usuario,
        c.cre_password  AS password,
        c.id_operador   AS idoperador,
        u.user_nombre   AS operador,
        c.id_sede       AS idsede,
        s.sed_nombre    AS sede,
        c.id_area       AS idarea,
        a.are_nombre    AS area,
        c.cre_estado    AS estado
        FROM credenciales AS c
        INNER JOIN areas AS a ON a.id_area = c.id_area
        INNER JOIN sedes AS s ON s.id_sede = c.id_sede
        INNER JOIN usuarios AS u ON u.id_usuario = c.id_operador
        ORDER BY c.id_credencial ASC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >AREA</th>
                <th scope="col" >SEDE</th>
                <th scope="col" >DOMINIO</th>
                <th scope="col" >USUARIO</th>
                <th scope="col" >CONTRASEÑA</th>
                <th scope="col" >ESTADO</th>
                <th>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newcorreo"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($correos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $correos['area'];?></td>
                <td><?php echo $correos['sede'];?></td>
                <td><?php echo $correos['dominio'];?></td>
                <td><?php echo $correos['usuario'];?></td>
                <td><?php echo $correos['password'];?></td>
                <td>
                    <?php
                    if ($correos['estado'] == 0) {
                    ?>
                        <button class="btn btn-danger btn-sm" onclick="activarcorreo(
                        <?php echo $correos['idcredencial'] ?>,
                        <?php echo $correos['estado'] ?>)">
                        INACTIVO
                        </button>
                        <?php
                    } else if ($correos['estado'] == 1) {
                        ?>
                        <button class="btn btn-success btn-sm" onclick="activarcorreo(
                        <?php echo $correos['idcredencial'] ?>,
                        <?php echo $correos['estado'] ?>)">
                        ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarcorreo" onclick="detallecorreo('<?php echo $correos['idcredencial']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
