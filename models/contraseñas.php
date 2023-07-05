<?php
    include "conexion.php";

    class Contraseñas extends Conexion {
        //FUNCIONES CORREO
        public function activarcorreo($idcorreo, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE correos SET cor_estado = ? WHERE id_correo = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idcorreo);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarcorreo($datos){
            $conexion = Conexion::conectar();
            //CONSULTA AREA
            $idarea = $datos['idarea'];
            $sqlarea = "SELECT a.are_nombre as area FROM areas as a WHERE a.id_area ='$idarea'";
            $resarea = mysqli_query($conexion, $sqlarea);
            $rwarea = mysqli_fetch_array($resarea);
            $area = $rwarea['area'];
            //CONSULTA SEDE
            $idsede = $datos['idsede'];
            $sqlsede = "SELECT s.sed_nombre as sede FROM sedes as s WHERE s.id_sede ='$idsede'";
            $ressede = mysqli_query($conexion, $sqlsede);
            $rwsede = mysqli_fetch_array($ressede);
            $sede = $rwsede['sede'];
            //REGISTRO AUDITORIA
            $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertbitacora);
            $registro = 'REGISTRO';
            $modulo = 'CONTRASEÑAS';
            $hoy = date("Y-m-d");
            $detalle = 'EL CORREO ' . $datos['correo'] . ' EN LA SEDE ' . $sede . ' EN EL AREA ' . $area;
            $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $idsede);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
               //AGREGAR CORREO A LA BD
                $sql = "INSERT INTO correos (id_operador, id_sede, id_area, cor_correo, cor_password, cor_fecha) VALUES( ?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("iiisss", $datos['idoperador'], $idsede, $idarea, $datos['correo'], $datos['password'], $hoy);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function editarcorreo($datos){
            $conexion = Conexion::conectar();
            //CONSULTA AREA
            $idarea = $datos['idarea'];
            $sqlarea = "SELECT a.are_nombre as area FROM areas as a WHERE a.id_area ='$idarea'";
            $resarea = mysqli_query($conexion, $sqlarea);
            $rwarea = mysqli_fetch_array($resarea);
            $area = $rwarea['area'];
            //CONSULTA SEDE
            $idsede = $datos['idsede'];
            $sqlsede = "SELECT s.sed_nombre as sede FROM sedes as s WHERE s.id_sede ='$idsede'";
            $ressede = mysqli_query($conexion, $sqlsede);
            $rwsede = mysqli_fetch_array($ressede);
            $sede = $rwsede['sede'];
            $hoy = date("Y-m-d");
            $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($insertbitacora);
            $registro = 'MODIFICO';
            $modulo = 'CONTRASEÑAS';
            $hoy = date("Y-m-d");
            $detalle = 'EL CORREO ' . $datos['correo'] . ' EN LA SEDE ' . $sede . ' EN EL AREA ' . $area;
            $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $idsede);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $sql = "UPDATE correos SET id_sede = ?,
                id_area = ?,
                cor_correo = ?,
                cor_password = ?,
                cor_fecha = ?
                WHERE id_correo = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('iisssi',
                        $datos['idsede'],
                        $datos['idarea'],
                        $datos['correo'],
                        $datos['passw'],
                        $hoy,
                        $datos['idcorreo']);
                $respuesta = $query->execute();
            }
            $query->close();
            return $respuesta;
        }

        public function detallecorreo($idcorreo){
            $conexion = Conexion::conectar();
            //CONSULTA CORREOS
            $sql ="SELECT
                c.id_correo  AS idcorreo,
                c.id_sede    AS idsede,
                c.id_area    AS idarea,
                c.cor_correo  AS correo,
                c.cor_password AS passw
                FROM correos AS c
                INNER JOIN areas AS a ON a.id_area = c.id_area
                INNER JOIN sedes AS s ON s.id_sede = c.id_sede
                WHERE c.id_correo ='$idcorreo'";
            $respuesta = mysqli_query($conexion,$sql);
            $correos = mysqli_fetch_array($respuesta);
            $datos = array(
                'idcorreo'  => $correos['idcorreo'],
                'idarea'    => $correos['idarea'],
                'idsede'    => $correos['idsede'],
                'correo'    => $correos['correo'],
                'passw'     => $correos['passw'],
            );
            return $datos;
        }

        //FUNCIONES FOLDER
        public function agregarfolder($datos){
            $conexion = Conexion::conectar();
            //AGREGAR CLAVE A LA BD
            $hoy = date("Y-m-d");
            $sql = "INSERT INTO folder (id_operador, fol_nombre, fol_password, fol_fecope) VALUES( ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("isss", $datos['idoperador'], $datos['nombre'], $datos['password'], $hoy);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
               //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $registro = 'REGISTRO';
                $modulo = 'CONTRASEÑAS';
                $detalle = 'LA CARPETA ' . $datos['nombre'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function detallefolder($idfolder){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                f.id_folder   AS idfolder,
                f.fol_nombre  AS nombre,
                f.fol_password  AS pass
                FROM folder AS f
                WHERE f.id_folder ='$idfolder'";
            $respuesta = mysqli_query($conexion, $sql);
            $folder = mysqli_fetch_array($respuesta);
            $datos = array(
                'idfolder'  => $folder['idfolder'],
                'nombre'    => $folder['nombre'],
                'pass'      => $folder['pass'],
            );
            return $datos;
        }

        public function editarfolder($datos){
            $conexion = Conexion::conectar();
            $hoy = date("Y-m-d");
            $sql = "UPDATE folder SET id_operador = ?,
                                        fol_nombre = ?,
                                        fol_password = ?
                                        WHERE id_folder = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issi',
                                $datos['idoperador'],
                                $datos['nombre'],
                                $datos['pass'],
                                $datos['idfolder']);
            $respuesta = $query->execute();
            $query->close();
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $registro = 'MODIFICO';
                $modulo = 'CONTRASEÑAS';
                $hoy = date("Y-m-d");
                $detalle = 'LA CARPETA ' . $datos['nombre'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        //FUNCIONES CLAVE
        public function agregarclave($datos){
            $conexion = Conexion::conectar();
            $registro = 'REGISTRO';
            $modulo = 'CONTRASEÑAS';
            $hoy = date("Y-m-d");
            //AGREGAR CLAVE A LA BD
            $sql = "INSERT INTO claves (id_operador, id_tipo, cla_equip, cla_user, cla_password, cla_nomwif, cla_clawif, cla_ip, cla_marca, cla_modelo, cla_patron, cla_serial, cla_fecope) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iisssssssssss", $datos['idoperador'], $datos['idtipo'], $datos['equipo'], $datos['usuario'], $datos['password'], $datos['nonwif'], $datos['calwif'], $datos['ip'], $datos['marca'],  $datos['modelo'], $datos['patron'], $datos['serial'], $hoy);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
               //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'LOS DETALLES DEL EQUIPO ' . $datos['equipo'] . ' CON SERIAL ' . $datos['serial'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function detalleclave($idclave){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                c.id_clave   AS idclave,
                c.id_tipo    AS idtipo,
                c.cla_equip  AS equipo,
                c.cla_user   AS usuario,
                c.cla_password   AS password,
                c.cla_nomwif AS nonwif,
                c.cla_clawif AS calwif,
                c.cla_ip     AS ip,
                c.cla_marca  AS marca,
                c.cla_modelo AS modelo,
                c.cla_patron AS patron,
                c.cla_serial AS serial
                FROM claves AS c
                WHERE c.id_clave ='$idclave'";
            $respuesta = mysqli_query($conexion,$sql);
            $clave = mysqli_fetch_array($respuesta);
            $datos = array(
                'idclave'  => $clave['idclave'],
                'idtipo'   => $clave['idtipo'],
                'equipo'   => $clave['equipo'],
                'usuario'  => $clave['usuario'],
                'password' => $clave['password'],
                'nonwif'   => $clave['nonwif'],
                'calwif'   => $clave['calwif'],
                'ip'       => $clave['ip'],
                'marca'    => $clave['marca'],
                'modelo'   => $clave['modelo'],
                'patron'   => $clave['patron'],
                'serial'   => $clave['serial'],
            );
            return $datos;
        }

        public function editarclave($datos){
            $conexion = Conexion::conectar();
            $hoy = date("Y-m-d");
            $sql = "UPDATE claves SET id_operador = ?,
                                        id_tipo = ?,
                                        cla_equip = ?,
                                        cla_user = ?,
                                        cla_password = ?,
                                        cla_nomwif = ?,
                                        cla_clawif = ?,
                                        cla_ip = ?,
                                        cla_marca = ?,
                                        cla_modelo = ?,
                                        cla_patron = ?,
                                        cla_serial = ?,
                                        cla_fecope = ?
                                        WHERE id_clave = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('iisssssssssssi',
                                $datos['idoperador'],
                                $datos['idtipo'],
                                $datos['equipo'],
                                $datos['usuario'],
                                $datos['password'],
                                $datos['nonwif'],
                                $datos['calwif'],
                                $datos['ip'],
                                $datos['marca'],
                                $datos['modelo'],
                                $datos['patron'],
                                $datos['serial'],
                                $hoy,
                                $datos['idclave']);
            $respuesta = $query->execute();
            $query->close();
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $registro = 'MODIFICO';
                $modulo = 'CONTRASEÑAS';
                $hoy = date("Y-m-d");
                $detalle = 'LOS DETALLES DEL EQUIPO ' . $datos['equipo'] . ' CON SERIAL ' . $datos['serial'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

    }

?>
