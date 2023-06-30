<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        f.id_folder   AS idfolder,
        f.fol_nombre  AS nombre,
        f.fol_password  AS password
        FROM folder AS f";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >NOMBRE</th>
                <th scope="col" >CONTRASEÑA</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($tareas = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $tareas['nombre'];?></td>
                <td><?php echo $tareas['password'];?></td>
                <td>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
