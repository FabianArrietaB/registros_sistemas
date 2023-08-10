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
                if ($datos['idasignado'] == 1) {
                    $asignado = 'FABIAN';
                } else if ($datos['idasignado'] == 2){
                    $asignado = 'JESUS';
                } else if ($datos['idasignado'] == 3){
                    $asignado = 'TODOS';
                }
                //VALIDACION DEL NIVEL
                if ($datos['nivel'] == 1) {
                    $nivel = 'BASICO';
                } else if ($datos['nivel'] == 2){
                    $nivel = 'MEDIO';
                } else if ($datos['nivel'] == 3){
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
                $query->bind_param('sssi', $datos['fecrea'], $hoy, $estado, $datos['idtarea']);
                $respuesta = $query->execute();
                $query->close();
            }
            return $respuesta;
        }

        public function cierremes                                                                                                                                                                      ($datos){
            $conexion = Conexion::conectar();
            //CONSULTA DE EQUIPOS
            $año = date("Y");
            //CERAMICASAS
            $numesccer = "SELECT COUNT(id_tipequ) AS canesccer FROM equipos WHERE id_tipequ = 2 AND id_sede = 1 ";
            $resnumesccer = mysqli_query($conexion, $numesccer);
            $rwnumesccer = mysqli_fetch_array($resnumesccer);
            $numporcer = "SELECT COUNT(id_tipequ) AS canporcer FROM equipos WHERE id_tipequ = 1 AND id_sede = 1";
            $resnumporcer = mysqli_query($conexion, $numporcer);
            $rwnumporcer = mysqli_fetch_array($resnumporcer);
            $numimpcer = "SELECT COUNT(id_tipequ) AS canimpcer FROM equipos WHERE id_tipequ = 3 AND id_sede = 1";
            $resnumimpcer = mysqli_query($conexion, $numimpcer);
            $rwnumimpcer = mysqli_fetch_array($resnumimpcer);
            $numcelcer = "SELECT COUNT(id_tipequ) AS cancelcer FROM equipos WHERE id_tipequ = 6 AND id_sede = 1";
            $resnumcelcer = mysqli_query($conexion, $numcelcer);
            $rwnumcelcer = mysqli_fetch_array($resnumcelcer);
            //FERRECASAS
            $numporfer = "SELECT COUNT(id_tipequ) AS canporfer FROM equipos WHERE id_tipequ = 1 AND id_sede = 2";
            $resnumporfer = mysqli_query($conexion, $numporfer);
            $rwnumporfer = mysqli_fetch_array($resnumporfer);
            $numescfer = "SELECT COUNT(id_tipequ) AS canescfer FROM equipos WHERE id_tipequ = 2 AND id_sede = 2";
            $resnumescfer = mysqli_query($conexion, $numescfer);
            $rwnumescfer = mysqli_fetch_array($resnumescfer);
            $numimpfer = "SELECT COUNT(id_tipequ) AS canimpfer FROM equipos WHERE id_tipequ = 3 AND id_sede = 2";
            $resnumimpfer = mysqli_query($conexion, $numimpfer);
            $rwnumimpfer = mysqli_fetch_array($resnumimpfer);
            $numcelfer = "SELECT COUNT(id_tipequ) AS cancelfer FROM equipos WHERE id_tipequ = 6 AND id_sede = 2";
            $resnumcelfer = mysqli_query($conexion, $numcelfer);
            $rwnumcelfer = mysqli_fetch_array($resnumcelfer);
            //METROPOLIS
            $numescmet = "SELECT COUNT(id_tipequ) AS canescmet FROM equipos WHERE id_tipequ = 2 AND id_sede = 3";
            $resnumescmet = mysqli_query($conexion, $numescmet);
            $rwnumescmet = mysqli_fetch_array($resnumescmet);
            $numpormet = "SELECT COUNT(id_tipequ) AS canpormet FROM equipos WHERE id_tipequ = 1 AND id_sede = 3";
            $resnumpormet = mysqli_query($conexion, $numpormet);
            $rwnumpormet = mysqli_fetch_array($resnumpormet);
            $numimpmet = "SELECT COUNT(id_tipequ) AS canimpmet FROM equipos WHERE id_tipequ = 3 AND id_sede = 3";
            $resnumimpmet = mysqli_query($conexion, $numimpmet);
            $rwnumimpmet = mysqli_fetch_array($resnumimpmet);
            $numcelmet = "SELECT COUNT(id_tipequ) AS cancelmet FROM equipos WHERE id_tipequ = 6 AND id_sede = 3";
            $resnumcelmet = mysqli_query($conexion, $numcelmet);
            $rwnumcelmet = mysqli_fetch_array($resnumcelmet);
            //MAYORISTA
            $numescmay = "SELECT COUNT(id_tipequ) AS canescmay FROM equipos WHERE id_tipequ = 2 AND id_sede = 4";
            $resnumescmay = mysqli_query($conexion, $numescmay);
            $rwnumescmay = mysqli_fetch_array($resnumescmay);
            $numpormay = "SELECT COUNT(id_tipequ) AS canpormay FROM equipos WHERE id_tipequ = 1 AND id_sede = 4";
            $resnumpormay = mysqli_query($conexion, $numpormay);
            $rwnumpormay = mysqli_fetch_array($resnumpormay);
            $numimpmay = "SELECT COUNT(id_tipequ) AS canimpmay FROM equipos WHERE id_tipequ = 3 AND id_sede = 4";
            $resnumimpmay = mysqli_query($conexion, $numimpmay);
            $rwnumimpmay = mysqli_fetch_array($resnumimpmay);
            $numcelmay = "SELECT COUNT(id_tipequ) AS cancelmay FROM equipos WHERE id_tipequ = 6 AND id_sede = 4";
            $resnumcelmay = mysqli_query($conexion, $numcelmay);
            $rwnumcelmay = mysqli_fetch_array($resnumcelmay);
            $hoy = date("Y-m-d");
            //VALIDACION DEL ESTADO
            $esccer = $rwnumesccer['canesccer'];
            $porcer = $rwnumporcer['canporcer'];
            $impcer = $rwnumimpcer['canimpcer'];
            $celcer = $rwnumcelcer['cancelcer'];
            $escfer = $rwnumescfer['canescfer'];
            $porfer = $rwnumporfer['canporfer'];
            $impfer = $rwnumimpfer['canimpfer'];
            $celfer = $rwnumcelfer['cancelfer'];
            $escmet = $rwnumescmet['canescmet'];
            $pormet = $rwnumpormet['canpormet'];
            $impmet = $rwnumimpmet['canimpmet'];
            $celmet = $rwnumcelmet['cancelmet'];
            $escmay = $rwnumescmay['canescmay'];
            $pormay = $rwnumpormay['canpormay'];
            $impmay = $rwnumimpmay['canimpmay'];
            $celmay = $rwnumcelmay['cancelmay'];

            //AGREGAR EQUIPOS A LA BD
            $sql = "INSERT INTO hisequipos (
                id_operador,
                his_añocierre,
                his_escceramicasas,
                his_porceramicasas,
                his_impceramicasas,
                his_celceramicasas,
                his_escferrecasas,
                his_porferrecasas,
                his_impferrecasas,
                his_celferrecasas,
                his_escmetropolis,
                his_pormetropolis,
                his_impmetropolis,
                his_celmetropolis,
                his_escmayorista,
                his_pormayorista,
                his_impmayorista,
                his_celmayorista,
                his_fecope)
                VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issssssssssssssssss",
                                $datos['idoperador'],
                                $año,
                                $esccer,
                                $porcer,
                                $impcer,
                                $celcer,
                                $escfer,
                                $porfer,
                                $impfer,
                                $celfer,
                                $escmet,
                                $pormet,
                                $impmet,
                                $celmet,
                                $escmay,
                                $pormay,
                                $impmay,
                                $celmay,
                                $hoy);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $registro = 'REGISTRO';
                $modulo = 'TAREAS';
                $detalle = 'EL CIERRE DE CANTIDAD EQUIPOS DEL ' . $año;
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

    }
?>
