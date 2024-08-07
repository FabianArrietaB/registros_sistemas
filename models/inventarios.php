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

    }
?>