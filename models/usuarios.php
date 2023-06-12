<?php
    include "conexion.php";

    class Usuarios extends Conexion {

        public function ingresousuario($usuario, $password){
            $conexion = Conexion::conectar();
            $sql =  "SELECT * FROM usuarios WHERE user_nombre = '$usuario' AND user_password = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($respuesta) > 0){
                $datosUsuario = mysqli_fetch_array($respuesta);
                if($datosUsuario['user_estado'] == 1){
                    $_SESSION['usuario']['nombre'] = $datosUsuario['user_nombre'];
                    $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }

        public function activarusuario($idusuario, $estado){
            $conexion = Conexion::conectar();
            if($estado == 1){
                $estado = 0;
            }else{
                $estado = 1;
            }
            $sql = "UPDATE usuarios SET user_estado = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estado, $idusuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarusuario($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO usuarios (id_operador, id_persona, id_rol, id_area, user_nombre, user_password) VALUES( ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiiss", $datos['idoperador'], $datos['idpersona'], $datos['idrol'], $datos['idarea'], $datos['usuario'], $datos['password']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleusuario($idusuario){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                u.id_usuario  AS idusuario,
                p.id_persona  AS idpersona,
                p.per_nombre  AS nombre,
                u.user_nombre AS usuario,
                u.user_password AS password,
                r.id_rol      AS idrol,
                r.rol_nombre  AS rol,
                a.id_area     AS idarea,
                a.are_nombre  AS area,
                u.user_estado AS estado
                FROM usuarios AS u
                INNER JOIN roles AS r ON u.id_rol = r.id_rol
                INNER JOIN personas AS p ON p.id_persona = u.id_persona
                INNER JOIN areas AS a ON a.id_area = u.id_area
                WHERE u.id_usuario ='$idusuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $usuario = mysqli_fetch_array($respuesta);
            $datos = array(
                'idusuario' => $usuario['idusuario'],
                'idpersona' => $usuario['idpersona'],
                'password'  => $usuario['password'],
                'idarea'    => $usuario['idarea'],
                'idrol'     => $usuario['idrol'],
                'usuario'   => $usuario['usuario'],
                'nombre'    => $usuario['nombre'],
            );
            return $datos;
        }

        public function editarusuario($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE usuarios SET id_operador = ?, id_rol = ?, id_area = ?, user_nombre = ?, user_password = ? WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('iiissi', $datos['idoperador'], $datos['idrol'], $datos['idarea'], $datos['usuario'], $datos['password'], $datos['idusuario']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarusuario($idusuario){
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM usuarios WHERE id_usuario=?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idusuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function cambiocontraseña($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE usuarios
                    SET password = ?
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('si', $datos['password'],
                                    $datos['idusuario']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>