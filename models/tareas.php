<?php
    include "conexion.php";

    class Tareas extends Conexion {

        public function finalizada($idtarea, $estado){
            $conexion = Conexion::conectar();
            //CONSULTA DETALLE DE LA TAREA
            $estact = "SELECT t.tar_detalle AS detalle FROM tareas as t WHERE t.id_tarea = '$idtarea'";
            $resultado = mysqli_query($conexion, $estact);
            $respuesta = mysqli_fetch_array($resultado);
            //VALIDACION DEL ESTADO
            $dettar = $respuesta['detalle'];
            $hoy = date("Y-m-d");
            $registro = 'CAMBIO';
            $modulo = 'TAREAS';
            $idoperador = $_SESSION['usuario']['id'];
            if ($respuesta > 0) {
                if($estado == 1){
                    $estado = 2;
                }else{
                    $estado = 1;
                }
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?,?,?,?,?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'EL ESTADO DE LA TAREA ' . $dettar . ' DE EN OPERACION A FINALIZADO';
                $query->bind_param("ssiss", $registro, $hoy, $idoperador, $modulo, $detalle);
                $respuesta = $query->execute();
                //CAMBIO DE ESTADO
                $sql = "UPDATE tareas SET tar_estado = ? WHERE id_tarea = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('si', $estado, $idtarea);
                $respuesta = $query->execute();
                $query->close();
            }
            return $respuesta;
        }

        public function creartarea($datos){
            $conexion = Conexion::conectar();
            //REGISTRO DE TAREA
            $sql = "INSERT INTO tareas (id_usuario, id_nivel, id_asignado, tar_detalle, tar_fecope) VALUES( ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiss", $datos['idoperador'], $datos['nivel'], $datos['idasignado'], $datos['detalle'], $datos['fecini']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $hoy = date("Y-m-d");
                $registro = 'REGISTRO';
                $modulo = 'TAREAS';
                //VALIDACION DEL ASIGNADO
                if ($datos['idasignado'] = 1) {
                    $asignado = 'FABIAN';
                } else if ($datos['idasignado'] = 2){
                    $asignado = 'JESUS';
                } else if ($datos['idasignado'] = 3){
                    $asignado = 'TODOS';
                }
                //VALIDACION DEL NIVEL
                if ($datos['nivel'] = 1) {
                    $nivel = 'BASICO';
                } else if ($datos['nivel'] = 2){
                    $nivel = 'MEDIO';
                } else if ($datos['nivel'] = 3){
                    $nivel = 'URGENTE';
                }
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'LA TAREA PARA ' . $asignado . ' DE NIVEL ' . $nivel;
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
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
            //CONSULTA DETALLE DE LA TAREA
            $idtarea = $datos['idtarea'];
            $estact = "SELECT t.tar_detalle AS detalle FROM tareas as t WHERE t.id_tarea = '$idtarea'";
            $resultado = mysqli_query($conexion, $estact);
            $respuesta = mysqli_fetch_array($resultado);
            //VALIDACION DEL ESTADO
            $dettar = $respuesta['detalle'];
            $hoy = date("Y-m-d");
            $registro = 'CAMBIO';
            $modulo = 'TAREAS';
            if ($respuesta > 0) {
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?,?,?,?,?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'EL ESTADO DE LA TAREA ' . $dettar . ' DE ABIERTO A EN OPERACION';
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
                //CAMBIO DE ESTADO
                $sql = "UPDATE tareas SET tar_fecrea = ?, tar_fecupt = ?, tar_estado = ? WHERE id_tarea = ?";
                $query = $conexion->prepare($sql);
                $estado = 1;
                $hoy = date("Y-m-d");
                $query->bind_param('sssi', $datos['fecrea'], $hoy, $estado, $datos['idtarea']);
                $respuesta = $query->execute();
                $query->close();
            }
            return $respuesta;
        }
    }

?>
