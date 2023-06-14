<?php
    session_start();
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $idusuario = $_SESSION['usuario']['id'];
    $sql = "SELECT
        v.id_venta    AS idventa,
        v.id_sede     AS idsede,
        v.id_area     AS idarea,
        V.ven_cantid  AS cantid,
        v.ven_nompro  AS nompro,
        v.ven_serial  AS serial,
        v.ven_numfac  AS numfac,
        v.ven_proove  AS proove,
        v.ven_detall  AS detall,
        v.ven_feccom  AS feccom,
        v.ven_fecope  AS fecope
    FROM ventas AS v
    ORDER BY v.id_venta DESC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >SEDE</th>
                <th scope="col" >AREA</th>
                <th scope="col" >CANTIDAD</th>
                <th scope="col" >PRODUCTO</th>
                <th scope="col" >SERIAL</th>
                <th scope="col" >FACTURA</th>
                <th scope="col" >PROVEEDOR</th>
                <th scope="col" >FECHA COMPRA</th>
                <th>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarcompra"><i class="fa-solid fa-square-plus fa-lg"></i></button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($equipos = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td><?php echo $equipos['idsede'];?></td>
                <td><?php echo $equipos['idarea'];?></td>
                <td><?php echo $equipos['cantid'];?></td>
                <td><?php echo $equipos['nompro'];?></td>
                <td><?php echo $equipos['serial'];?></td>
                <td><?php echo $equipos['numfac'];?></td>
                <td><?php echo $equipos['proove'];?></td>
                <td><?php echo $equipos['feccom'];?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
