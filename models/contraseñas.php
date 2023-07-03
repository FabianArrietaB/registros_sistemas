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
            $hoy = date("Y-m-d");
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
                                $datos['password'],
                                $hoy,
                                $datos['idcorreo']);
            $respuesta = $query->execute();
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
                c.cor_password AS password
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
                'password'  => $correos['password'],
            );
            return $datos;
        }

        //FUNCIONES FOLDER
        public function detallefolder($idfoler){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                f.id_folder   AS idfoder,
                f.fol_nombre  AS folder,
                f.fol_password  AS password
                FROM folder AS f
                WHERE f.id_folder ='$idfoler'";
            $respuesta = mysqli_query($conexion,$sql);
            $folder = mysqli_fetch_array($respuesta);
            $datos = array(
                'idfoder'  => $folder['idfoder'],
                'folder'  => $folder['folder'],
                'password'  => $folder['password'],
            );
            return $datos;
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
                'idtipo'  => $clave['idtipo'],
                'equipo'  => $clave['equipo'],
                'usuario'  => $clave['usuario'],
                'password' => $clave['password'],
                'nonwif'  => $clave['nonwif'],
                'calwif'  => $clave['calwif'],
                'ip'  => $clave['ip'],
                'marca'  => $clave['marca'],
                'modelo'  => $clave['modelo'],
                'patron'  => $clave['patron'],
                'serial'  => $clave['serial'],
            );
            return $datos;
        }

    }

?>
