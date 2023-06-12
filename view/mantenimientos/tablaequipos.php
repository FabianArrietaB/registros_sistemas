<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        e.id_equipo   AS idequipo,
        e.id_area     AS idarea,
        e.id_sede     AS idsede,
        s.sed_nombre  AS sede,
        a.are_nombre  AS area,
        e.equ_marca   AS marca,
        e.equ_modelo  AS modelo,
        e.equ_tipram  AS tipram,
        e.equ_ram     AS ram,
        e.equ_proce   AS procesa,
        e.equ_tipdis  AS tipdis,
        e.equ_capdis  AS capdis,
        e.equ_fecope  AS fecha,
        e.equ_codact  AS codigo,
        e.equ_serial  AS serial,
        e.equ_grafica AS grafic
    FROM equipos AS e
    INNER JOIN areas AS a ON a.id_area = e.id_area
    INNER JOIN sedes AS s ON s.id_sede = e.id_sede";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >AREA</th>
                <th scope="col" >MARCA</th>
                <th scope="col" >MODELO</th>
                <th scope="col" >SERIAL</th>
                <th scope="col" >CODIGO ACTIVO</th>
                <th scope="col" >SEDE</th>
                <th scope="col" >FECHA REGISTRO</th>
                <th>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearequipo"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($equipos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $equipos['area'];?></td>
                <td><?php echo $equipos['marca']; ?></td>
                <td><?php echo $equipos['modelo']; ?></td>
                <td><?php echo $equipos['serial'];  ?></td>
                <td><?php echo $equipos['codigo'];  ?></td>
                <td><?php echo $equipos['sede'];  ?></td>
                <td><?php echo $equipos['fecha'];    ?></td>
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
