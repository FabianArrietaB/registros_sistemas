<?php
    include "conexion.php";

    class Inventario extends Conexion {

        public function productos(){
            $con = new Conexion();
            $sql = $con->conectarFomplus()->prepare('SELECT * FROM MAEINV WHERE INV_ACTIVO = 0');
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function precios($referencia){
            $con = new Conexion();
            $sql = $con->conectarFomplus()->prepare('SELECT
                CONCAT(p.INV_REFER, p.INV_NOMBRE) PRODUCTO,
                l.PRE_OBSERV LISTA_NOMBRE,
                l.PRE_VALOR LISTA_PRECIO
                FROM METROCERAMICA.dbo.MAEINV p
                INNER JOIN METROCERAMICA.dbo.LISPRE l ON l.PRE_REFER = p.INV_REFER
                WHERE INV_ACTIVO = 0 AND p.INV_REFER = ?');
            $sql->execute(array($referencia));
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    }
?>