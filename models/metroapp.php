<?php
    include "conexion.php";

    class Metroapp extends Conexion {

        public function usuarios(){
            $con = new Conexion();
            $sql = $con->conectarBD()->prepare('SELECT * FROM usuario ORDER BY estado DESC, user_');
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function estadousuarios($idusuario, $estado){
            $con = new Conexion();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = $con->conectarBD()->prepare('UPDATE usuario SET estado = ? WHERE id = ?');
            $sql->execute(array($estado, $idusuario));
            if($sql != null){
                return 1;
            }else{
                return 0;
            }
        }

        public function permisos($idusuario){
            $con = new Conexion();
            $sql = $con->conectarBD()->prepare('SELECT *  FROM usuario WHERE id = ?');
            $sql->execute(array($idusuario));
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        public function addremove($idusuario, $estado, $modulo){
            $con = new Conexion();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = $con->conectarBD()->prepare("UPDATE usuario SET {$modulo} = ? WHERE id = ?");
            $sql->execute(array($estado, $idusuario));
            if($sql != null){
                return 1;
            }else{
                return 0;
            }
        }

    }
?>