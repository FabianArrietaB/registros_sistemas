<?php
    include "conexion.php";

    class Metroapp extends Conexion {

        public function usuarios(){

            $con = new Conexion();

            $sql = $con->conectarBD()->prepare('SELECT * FROM usuario WHERE estado = 1');
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function permisos($idusuario){

            $con = new Conexion();
            $sql = $con->conectarBD()->prepare('SELECT CASE WHEN precio = 1 THEN LISTA PRECIO END modulo FROM usuario WHERE id = ?');
            $sql->execute(array($idusuario));
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }
?>