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

    }
    ?>