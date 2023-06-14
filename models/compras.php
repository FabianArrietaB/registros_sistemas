<?php
    include "conexion.php";

    class Compras extends Conexion {

        public function agregarcompra($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO ventas (id_operador, id_sede, id_area, ven_cantid, ven_nompro, ven_serial, ven_numfac, ven_proove, ven_detall, ven_feccom, ven_fecope) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $hoy = date("Y-m-d");
            $query->bind_param("iiissssssss", $datos['idoperador'], $datos['idsede'], $datos['idarea'], $datos['cantid'], $datos['nompro'], $datos['serial'],  $datos['numfac'],  $datos['proove'],  $datos['detall'],  $datos['feccom'], $hoy);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detallecompras($idventa){
            $conexion = Conexion::conectar();
            $sql ="SELECT
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
                WHERE v.id_venta = '$idventa'";
            $respuesta = mysqli_query($conexion,$sql);
            $compras = mysqli_fetch_array($respuesta);
            $datos = array(
                'idventa'    => $compras['idventa'],
                'idsede'     => $compras['idsede'],
                'idarea'     => $compras['idarea'],
                'area'       => $compras['area'],
                'cantid'     => $compras['cantid'],
                'nompro'     => $compras['nompro'],
                'serial'     => $compras['serial'],
                'numfac'     => $compras['numfac'],
                'proove'     => $compras['proove'],
                'detall'     => $compras['detall'],
                'feccom'     => $compras['feccom'],
                'fecope'     => $compras['fecope'],
            );
            return $datos;
        }

    }
    ?>