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
        a.are_nombre  AS area,
        V.ven_cantid  AS cantid,
        v.ven_nompro  AS nompro,
        v.ven_serial  AS serial,
        v.ven_numfac  AS numfac,
        v.ven_proove  AS proove,
        v.ven_detall  AS detall,
        v.ven_feccom  AS feccom,
        v.ven_fecope  AS fecope
    FROM ventas AS v
    INNER JOIN areas AS a ON a.id_area = v.id_area
    ORDER BY v.id_venta DESC";
    $query = mysqli_query($conexion, $sql);
?>
<!-- inicio Tabla -->
<div class="table-responsive">
    <table class="table table-light text-center">
        <thead>
            <tr>
                <th scope="col" >FACTURA</th>
                <th scope="col" >PROVEEDOR</th>
                <th scope="col" >SEDE</th>
                <th scope="col" >AREA</th>
                <th scope="col" >FECHA COMPRA</th>
                <th>
                    <div class="d-grid gap-2">
                         </div>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
            while ($compras = mysqli_fetch_array($query)){
        ?>
            <tr>
                <td data-bs-toggle="modal" data-bs-target="#detallecompra" onclick="detallecompras('<?php echo $compras['idventa']?>')"><?php echo $compras['numfac'];?></td>
                <td><?php echo $compras['proove'];?></td>
                <td><?php echo $compras['area'];?></td>
                <td>
                <?php if ($compras['idsede'] == 1) { ?>
                    <h5><span >CERAMICASAS</span></h5>
                <?php } else if ($compras['idsede'] == 2) { ?>
                    <h5><span >FERRECASAS</span></h5>
                <?php } else if ($compras['idsede'] == 3) { ?>
                    <h5><span >METROPOLIS</span></h5>
                <?php } else if ($compras['idsede'] == 4) { ?>
                    <h5><span >MAYORISTA</span></h5>
                <?php } ?>
                </td>
                <td><?php echo $compras['feccom'];?></td>
                <td>
                
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- fin de la tabla -->
