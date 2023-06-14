<?php
    include "conexion.php";

    class Tareas extends Conexion {

        public function finalizada($idtarea, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 2;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE tareas SET tar_estado = ? WHERE id_tarea = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('si', $estado, $idtarea);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function creartarea($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO tareas (id_usuario, id_nivel, id_asignado, tar_detalle, tar_fecope) VALUES( ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiss", $datos['idoperador'], $datos['nivel'], $datos['idasignado'], $datos['detalle'], $datos['fecini']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalletarea($idtarea){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                t.id_tarea    AS idtarea,
                t.id_usuario  AS idusuario,
                t.id_nivel    AS idnivel,
                t.id_asignado AS idasignado,
                t.tar_detalle AS detalle,
                t.tar_fecope  AS fecope,
                t.tar_fecupt  AS fecupt,
                t.tar_fecrea  AS fecrea,
                t.tar_estado  AS estado
            FROM tareas AS t
            WHERE t.id_tarea ='$idtarea'";
            $respuesta = mysqli_query($conexion,$sql);
            $tareas = mysqli_fetch_array($respuesta);
            $datos = array(
                'idtarea'    => $tareas['idtarea'],
                'idusuario'  => $tareas['idusuario'],
                'idnivel'    => $tareas['idnivel'],
                'idasignado' => $tareas['idasignado'],
                'detalle'    => $tareas['detalle'],
                'fecope'     => $tareas['fecope'],
                'fecupt'     => $tareas['fecupt'],
                'fecrea'     => $tareas['fecrea'],
                'estado'     => $tareas['estado'],
            );
            return $datos;
        }

        public function soluciontarea($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE tareas SET tar_fecrea = ?, tar_fecupt = ?, tar_estado = ? WHERE id_tarea = ?";
            $query = $conexion->prepare($sql);
            $estado = 1;
            $hoy = date("Y-m-d");
            $query->bind_param('sssi', $datos['fecrea'], $hoy, $estado, $datos['idtarea']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }

?>
