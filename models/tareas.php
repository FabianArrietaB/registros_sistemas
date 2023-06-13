<?php
    include "conexion.php";

    class Tareas extends Conexion {

        public function creartarea($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO tareas (id_usuario, id_nivel, id_asignado, tar_detalle, tar_fecope) VALUES( ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiss", $datos['idoperador'], $datos['nivel'], $datos['idasignado'], $datos['detalle'], $datos['fecini']);
            $respuesta = $query->execute();
            return $respuesta;
        }
     
    }

?>
