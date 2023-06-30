<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        c.id_correo   AS idcorreo,
        c.cor_correo  AS correo,
        c.id_area  AS idarea,
        a.are_nombre  AS area,
        c.cor_password AS password,
        c.cor_estado AS estado
        FROM correos AS c
        INNER JOIN areas AS a ON a.id_area = c.id_area";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >CORREO</th>
                <th scope="col" >AREA</th>
                <th scope="col" >CONTRASEÑA</th>
                <th scope="col" >ESTADO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($correos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $correos['correo'];?></td>
                <td><?php echo $correos['area'];?></td>
                <td><?php echo $correos['password'];?></td>
                <td>
                    <?php
                    if ($correos['estado'] == 0) {
                    ?>
                        <button class="btn btn-danger btn-sm" onclick="activarcorreo(
                        <?php echo $correos['idcorreo'] ?>,
                        <?php echo $correos['estado'] ?>)">
                        INACTIVO
                        </button>
                        <?php
                    } else if ($correos['estado'] == 1) {
                        ?>
                        <button class="btn btn-success btn-sm" onclick="activarcorreo(
                        <?php echo $correos['idcorreo'] ?>,
                        <?php echo $correos['estado'] ?>)">
                        ACTIVO
                        </button>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editar" onclick="detalleusuario('<?php echo $correos['idcorreo']?>')"><i class="fa-solid fa-pen-to-square fa-beat fa-xl"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
