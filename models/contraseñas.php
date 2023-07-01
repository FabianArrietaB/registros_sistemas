<?php
    include "conexion.php";

    class Contraseñas extends Conexion {

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

        public function cambiopassword($datos){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $idcorreo = $datos['idcorreo'];
            $correo = "SELECT c.cor_correo AS correo, c.cor_password AS password FROM correos as c WHERE c.id_correo ='$idcorreo'";
            $resultado = mysqli_query($conexion, $correo);
            $respuesta = mysqli_fetch_array($resultado);
            $correo = $respuesta['correo'];
            $password = $respuesta['password'];
            $hoy = date("Y-m-d");
            $registro = 'CAMBIO';
            $modulo = 'CONTRASEÑAS';
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?,?,?,?,?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'CONTRASEÑA '. $password . ' POR ' . $datos['password'] . ' AL CORREO ' . $correo;
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
                //REGISTRO CODIGO ACTIVO
                $sql = "UPDATE correos SET cor_password = ? WHERE id_correo = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('si', $datos['password'], $datos['idcorreo']);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function detallecorreo($idcorreo){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                c.id_correo   AS idcorreo,
                c.cor_correo  AS correo,
                c.id_area  AS idarea,
                c.cor_password AS password,
                c.cor_estado AS estado
                FROM correos AS c
                WHERE c.id_correo ='$idcorreo'";
            $respuesta = mysqli_query($conexion,$sql);
            $correos = mysqli_fetch_array($respuesta);
            $datos = array(
                'idcorreo'  => $correos['idcorreo'],
                'password'  => $correos['password'],
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
