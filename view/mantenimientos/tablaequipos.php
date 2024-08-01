<?php
    session_start();
    $filtro = '';
    if(isset($_GET['filtro'])){
        $filtro = $_GET['filtro'];
    }
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        e.id_equipo     idequipo,
        e.id_operador   idoperador,
        e.id_sede       idsede,
        s.sed_nombre    sede,
        e.id_area       idarea,
        a.are_nombre    area,
        e.id_tipequ     tipequ,
        CONCAT(e.equ_marca, ' - ' ,e.equ_modelo) equipo,
        e.equ_tipram    tipram,
        e.equ_ram       capram,
        e.equ_proce     proces,
        e.equ_tipdis    tipdis,
        e.equ_capdis    capdis,
        e.equ_grafica   grafica,
        e.equ_imeis     imeis,
        e.equ_serial    serial,
        e.equ_codact    codact,
        e.equ_nomequ    nomequ,
        e.equ_mac       mac,
        e.equ_fecope    fecha,
        e.equ_estado    estado
    FROM equipos e
    INNER JOIN areas AS a ON a.id_area = e.id_area
    INNER JOIN sedes AS s ON s.id_sede = e.id_sede
    ORDER BY e.id_sede";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center" id="equipos">
        <thead>
            <tr>
                <th scope="col" >AREA</th>
                <th scope="col" >PRODUCTO</th>
                <th scope="col" >SERIAL</th>
                <th scope="col" >CODIGO ACTIVO</th>
                <th scope="col" >SEDE</th>
                <th scope="col" >FECHA REGISTRO</th>
                <th scope="col" >ESTADO</th>
                <th>
                    <?php if($_SESSION['usuario']['rol'] == 4) {?>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearequipo"><i class="fa-solid fa-desktop fa-lg"></i></button>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addcel"><i class="fa-solid fa-mobile-retro fa-lg"></i></button>
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
                <td>
				<?php
                if ($equipos['tipequ'] == 1) {
                    $nomequipo = 'EL PORTATIL';
                } else if ($equipos['tipequ'] ==2){
                    $nomequipo = 'EL EQUIPO ESCRITORIO';
                } else if ($equipos['tipequ'] == 3){
                    $nomequipo = 'LA IMPRESORA';
                } else if ($equipos['tipequ'] == 4){
                    $nomequipo = 'EL DVR';
                } else if ($equipos['tipequ'] == 5){
                    $nomequipo = 'EL MONITOR';
                } else if ($equipos['tipequ'] == 6){
                    $nomequipo = 'EL CELULAR';
                }
                echo $nomequipo . ' ' . $equipos['equipo'];
                ?>
                <td><?php if ($equipos['tipequ'] == 6) {
                        echo $equipos['imeis'];
                    } else {
                        echo $equipos['serial'];
                }
                ?>
                </td>
                <td><?php echo $equipos['codact'];  ?></td>
                <td><?php echo $equipos['sede'];  ?></td>
                <td><?php echo $equipos['fecha'];    ?></td>
                <td>
                    <?php if ($equipos['estado'] == 1) { ?>
                        <span class="btn btn-success">ASIGNADO</span>
                    <?php } else if ($equipos['estado'] == 2) { ?>
                        <span class="btn btn-warning">ALMACENADO</span>
                    <?php } else if ($equipos['estado'] == 3) { ?>
                        <span class="btn btn-danger">DESPRECIADO</span>
                    <?php } ?>
                </td>
                <td>
                <?php if($_SESSION['usuario']['rol'] == 4) {?>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarequipo" onclick="detalleequipo('<?php echo $equipos['idequipo']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button> 
                <?php } ?>
                <?php if($_SESSION['usuario']['rol'] == 2 && $equipos['codact'] == 'NO ASIGNADO') {?>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#codactivo" onclick="detalleactivo('<?php echo $equipos['idequipo']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
