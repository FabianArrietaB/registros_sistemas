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

        public function cierremes($datos){
            $conexion = Conexion::conectar();
            $sqlaño = "SELECT YEAR(CURDATE()) AS año";
            $query1 = mysqli_query($conexion, $sqlaño);
            $rw_año = mysqli_fetch_array($query1);
            $año = $rw_año['año'];
            $hoy = date("Y-m-d");
            $modulo = 'TAREAS';
            $registro = 'CIERRE';
            // CONSULTA EQUIPOS CERAMICASAS
            $sqlporcer = "SELECT COUNT(id_tipequ) AS canporcer FROM equipos WHERE id_tipequ = 1 AND id_sede = 1";
            $query1 = mysqli_query($conexion, $sqlporcer);
            $rw_porcer = mysqli_fetch_array($query1);
            $porcer = $rw_porcer['canporcer'];
            $sqlesccer = "SELECT COUNT(id_tipequ) AS canesccer FROM equipos WHERE id_tipequ = 2 AND id_sede = 1";
            $query2 = mysqli_query($conexion, $sqlesccer);
            $rw_esccer = mysqli_fetch_array($query2);
            $esccer = $rw_esccer['canesccer'];
            $sqlimpcer = "SELECT COUNT(id_tipequ) AS canimpcer FROM equipos WHERE id_tipequ = 3 AND id_sede = 1";
            $query3 = mysqli_query($conexion, $sqlimpcer);
            $rw_impcer = mysqli_fetch_array($query3);
            $impcer = $rw_impcer['canimpcer'];
            $sqlcelcer = "SELECT COUNT(id_tipequ) AS cancelcer FROM equipos WHERE id_tipequ = 6 AND id_sede = 1";
            $query4 = mysqli_query($conexion, $sqlcelcer);
            $rw_celcer = mysqli_fetch_array($query4);
            $celcer = $rw_celcer['cancelcer'];
            // CONSULTA EQUIPOS FERRECASAS
            $sqlporfer = "SELECT COUNT(id_tipequ) AS canporfer FROM equipos WHERE id_tipequ = 1 AND id_sede = 2";
            $query5 = mysqli_query($conexion, $sqlporfer);
            $rw_porfer = mysqli_fetch_array($query5);
            $porfer = $rw_porfer['canporfer'];
            $sqlescfer = "SELECT COUNT(id_tipequ) AS canescfer FROM equipos WHERE id_tipequ = 2 AND id_sede = 2";
            $query6 = mysqli_query($conexion, $sqlescfer);
            $rw_escfer = mysqli_fetch_array($query6);
            $escfer = $rw_escfer['canescfer'];
            $sqlimpfer = "SELECT COUNT(id_tipequ) AS canimpfer FROM equipos WHERE id_tipequ = 3 AND id_sede = 2";
            $query7 = mysqli_query($conexion, $sqlimpfer);
            $rw_impfer = mysqli_fetch_array($query7);
            $impfer = $rw_impfer['canimpfer'];
            $sqlcelfer = "SELECT COUNT(id_tipequ) AS cancelfer FROM equipos WHERE id_tipequ = 6 AND id_sede = 2";
            $query8 = mysqli_query($conexion, $sqlcelfer);
            $rw_celfer = mysqli_fetch_array($query8);
            $celfer = $rw_celfer['cancelfer'];
            // CONSULTA EQUIPOS METROPOLIS
            $sqlpormet = "SELECT COUNT(id_tipequ) AS canpormet FROM equipos WHERE id_tipequ = 1 AND id_sede = 3";
            $query9 = mysqli_query($conexion, $sqlpormet);
            $rw_pormet = mysqli_fetch_array($query9);
            $pormet = $rw_pormet['canpormet'];
            $sqlescmet = "SELECT COUNT(id_tipequ) AS canescmet FROM equipos WHERE id_tipequ = 2 AND id_sede = 3";
            $query10 = mysqli_query($conexion, $sqlescmet);
            $rw_escmet = mysqli_fetch_array($query10);
            $escmet = $rw_escmet['canescmet'];
            $sqlimpmet = "SELECT COUNT(id_tipequ) AS canimpmet FROM equipos WHERE id_tipequ = 3 AND id_sede = 3";
            $query11 = mysqli_query($conexion, $sqlimpmet);
            $rw_impmet = mysqli_fetch_array($query11);
            $impmet = $rw_impmet['canimpmet'];
            $sqlcelmet = "SELECT COUNT(id_tipequ) AS cancelmet FROM equipos WHERE id_tipequ = 6 AND id_sede = 3";
            $query12 = mysqli_query($conexion, $sqlcelmet);
            $rw_celmet = mysqli_fetch_array($query12);
            $celmet = $rw_celmet['cancelmet'];
            // CONSULTA EQUIPOS METROPOLIS
            $sqlpormay = "SELECT COUNT(id_tipequ) AS canpormay FROM equipos WHERE id_tipequ = 1 AND id_sede = 4";
            $query13 = mysqli_query($conexion, $sqlpormay);
            $rw_pormay = mysqli_fetch_array($query13);
            $pormay = $rw_pormay['canpormay'];
            $sqlescmay = "SELECT COUNT(id_tipequ) AS canescmay FROM equipos WHERE id_tipequ = 2 AND id_sede = 4";
            $query14 = mysqli_query($conexion, $sqlescmay);
            $rw_escmay = mysqli_fetch_array($query14);
            $escmay = $rw_escmay['canescmay'];
            $sqlimpmay = "SELECT COUNT(id_tipequ) AS canimpmay FROM equipos WHERE id_tipequ = 3 AND id_sede = 4";
            $query15 = mysqli_query($conexion, $sqlimpmay);
            $rw_impmay = mysqli_fetch_array($query15);
            $impmay = $rw_impmay['canimpmay'];
            $sqlcelmay = "SELECT COUNT(id_tipequ) AS cancelmay FROM equipos WHERE id_tipequ = 6 AND id_sede = 4";
            $query16 = mysqli_query($conexion, $sqlcelmay);
            $rw_celmay = mysqli_fetch_array($query16);
            $celmay = $rw_celmay['cancelmay'];
            $inserthis = "INSERT INTO hisequipos (id_operador,
                                            his_añocierre,
                                            his_escceramicasas,
                                            his_porceramicasas,
                                            his_impceramicasas,
                                            his_celceramicasas,
                                            his_escferrecasas,
                                            his_porferrecasas,
                                            his_impferrecasas,
                                            his_celferrecasas
                                            his_escmetropolis,
                                            his_pormetropolis,
                                            his_impmetropolis,
                                            his_celmetropolis,
                                            his_escmayorista,
                                            his_pormayorista,
                                            his_impmayorista,
                                            his_celmayorista,
                                            his_fecope) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($inserthis);
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
            return $respuesta;
        }
    }

?>
