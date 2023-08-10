<?php
    include "conexion.php";

    class Equipos extends Conexion {

        public function crearequipo($datos){
            //REGISTRO DEL EQUIPO A LA BD
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO equipos (id_operador, id_sede, id_area, id_tipequ, equ_marca, equ_modelo, equ_tipram, equ_ram, equ_proce, equ_tipdis, equ_capdis, equ_grafica, equ_serial, equ_nomequ, equ_mac, equ_fecope) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiissssssssssss", $datos['idoperador'], $datos['idsede'], $datos['idarea'], $datos['idtipequ'], $datos['marca'], $datos['modelo'], $datos['tipram'], $datos['ram'], $datos['procesa'], $datos['tipdis'], $datos['capdis'], $datos['grafic'], $datos['serial'], $datos['nomequ'], $datos['mac'], $datos['fecha']);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                $registro = 'REGISTRO';
                $modulo = 'EQUIPOS';
                //VALIDACION TIPO EQUIPO
                if ($datos['idtipequ'] = 1) {
                    $equipo = 'EL PORTATIL';
                } else if ($datos['idtipequ'] = 2){
                    $equipo = 'EL EQUIPO ESCRITORIO';
                } else if ($datos['idtipequ'] = 3){
                    $equipo = 'LA IMPRESORA';
                } else if ($datos['idtipequ'] = 4){
                    $equipo = 'EL DVR';
                } else if ($datos['idtipequ'] = 5){
                    $equipo = 'EL MONITOR';
                }
                $hoy = date("Y-m-d");
                if ($datos['numfac'] != "" && $datos['valor'] !="") {
                    //REGISTRO DEL EQUIPO Al MODULO COMPRA
                    $insertcompra = "INSERT INTO ventas (id_operador, id_sede, id_area, ven_nompro, ven_marca, ven_modelo, ven_serial, ven_numfac, ven_valor, ven_proove, ven_detall, ven_feccom, ven_fecope) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertcompra);
                    $query->bind_param("iiissssssssss", $datos['idoperador'], $datos['idsede'], $datos['idarea'], $equipo, $datos['marca'], $datos['modelo'], $datos['serial'], $datos['numfac'], $datos['valor'], $datos['proove'], $datos['detall'], $datos['fecha'], $hoy);
                    $respuesta = $query->execute();
                    //REGISTRO AUDITORIA
                    $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertbitacora);
                    $detalle = $equipo . ' CON SERIAL ' . $datos['serial'] . ' DE LA FACTURA ' . $datos['numfac'];
                    $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $datos['idsede']);
                    $respuesta = $query->execute();
                }else{
                    //REGISTRO AUDITORIA
                    $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertbitacora);
                    $detalle = $equipo . ' CON SERIAL ' . $datos['serial'];
                    $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $datos['idsede']);
                    $respuesta = $query->execute();
                }
                
            }
            return $respuesta;
        }

        public function crearcelular($datos){
            //REGISTRO DEL EQUIPO A LA BD
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO equipos (id_operador, id_sede, id_area, id_tipequ, equ_marca, equ_modelo, equ_ram, equ_proce, equ_capdis, equ_serial, equ_imeis, equ_nomequ, equ_mac, equ_fecope) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $imeis = $datos['imei1'] . ' - ' . $datos['imei2'];
            $query->bind_param("iiiissssssssss", $datos['idoperador'], $datos['idsede'], $datos['idarea'], $datos['idtipequ'], $datos['marca'], $datos['modelo'], $datos['ram'], $datos['procesa'], $datos['capdis'], $datos['serial'],  $imeis, $datos['nomequ'], $datos['mac'], $datos['fecha']);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                $registro = 'REGISTRO';
                $modulo = 'EQUIPOS';
                $equipo = 'CELULAR';
                $hoy = date("Y-m-d");
                if ($datos['numfac'] != "" && $datos['valor'] != "") {
                    //REGISTRO DEL EQUIPO Al MODULO COMPRA
                    $insertcompra = "INSERT INTO ventas (id_operador, id_sede, id_area, ven_nompro, ven_marca, ven_modelo, ven_serial, ven_numfac, ven_valor, ven_proove, ven_detall, ven_feccom, ven_fecope) VALUES( ?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertcompra);
                    $query->bind_param("iiissssssssss", $datos['idoperador'], $datos['idsede'], $datos['idarea'], $equipo, $datos['marca'], $datos['modelo'], $datos['serial'], $datos['numfac'], $datos['valor'], $datos['proove'], $datos['detall'], $datos['fecha'], $hoy);
                    $respuesta = $query->execute();
                    //REGISTRO AUDITORIA
                    $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertbitacora);
                    $detalle = $equipo . ' CON SERIAL ' . $datos['serial'] . ' DE LA FACTURA ' . $datos['numfac'];
                    $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $datos['idsede']);
                    $respuesta = $query->execute();
                } else {
                    //REGISTRO AUDITORIA
                    $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
                    $query = $conexion->prepare($insertbitacora);
                    $detalle = $equipo . ' CON SERIAL ' . $datos['serial'];
                    $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $datos['idsede']);
                    $respuesta = $query->execute();
                }
            }
            return $respuesta;
        }

        public function agregaractivo($datos){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $idequipo = $datos['actidequipo'];
            $equipo = "SELECT e.equ_codact as codant, e.id_sede as idsede, e.equ_serial as serial FROM equipos as e WHERE e.id_equipo ='$idequipo'";
            $resultado = mysqli_query($conexion, $equipo);
            $respuesta = mysqli_fetch_array($resultado);
            $serial = $respuesta['serial'];
            $sede = $respuesta['idsede'];
            $codant = $respuesta['codant'];
            $hoy = date("Y-m-d");
            $registro = 'MODIFICO';
            $modulo = 'EQUIPOS';
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'CODIGO ACTIVO '. $codant . ' POR ' . $datos['codact'] . ' AL EQUIPO CON SERIAL ' . $serial;
                $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $sede);
                $respuesta = $query->execute();
                //REGISTRO CODIGO ACTIVO
                $sql = "UPDATE equipos SET equ_codact = ? WHERE id_equipo = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('si', $datos['codact'], $datos['actidequipo']);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }

        public function detalleequipo($idequipo){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                e.id_equipo   AS idequipo,
                e.id_sede     AS idsede,
                e.id_area     AS idarea,
                a.are_nombre  AS area,
                e.id_tipequ   AS idtipequ,
                e.equ_marca   AS marca,
                e.equ_modelo  AS modelo,
                e.equ_tipram  AS tipram,
                e.equ_ram     AS ram,
                e.equ_proce   AS procesa,
                e.equ_tipdis  AS tipdis,
                e.equ_capdis  AS capdis,
                e.equ_grafica AS grafic,
                e.equ_serial  AS serial,
                e.equ_codact  AS codact,
                e.equ_nomequ  AS nomequ,
                e.equ_mac     AS mac,
                e.equ_fecope  AS fecha
                FROM equipos AS e
                INNER JOIN areas as a ON a.id_area = e.id_area
                WHERE e.id_equipo ='$idequipo'";
            $respuesta = mysqli_query($conexion,$sql);
            $equipos = mysqli_fetch_array($respuesta);
            $datos = array(
                'idequipo'  => $equipos['idequipo'],
                'idsede'    => $equipos['idsede'],
                'idarea'    => $equipos['idarea'],
                'area'      => $equipos['area'],
                'idtipequ'  => $equipos['idtipequ'],
                'marca'     => $equipos['marca'],
                'modelo'    => $equipos['modelo'],
                'tipram'    => $equipos['tipram'],
                'ram'       => $equipos['ram'],
                'procesa'   => $equipos['procesa'],
                'tipdis'    => $equipos['tipdis'],
                'capdis'    => $equipos['capdis'],
                'grafic'    => $equipos['grafic'],
                'serial'    => $equipos['serial'],
                'codact'    => $equipos['codact'],
                'nomequ'    => $equipos['nomequ'],
                'mac'       => $equipos['mac'],
                'fecha'     => $equipos['fecha'],
            );
            return $datos;
        }

        public function detalleactivo($idequipo){
            $conexion = Conexion::conectar();
            //CONSULTA DATOS DEL EQUIPO
            $sql ="SELECT
                e.id_equipo   AS actidequipo,
                e.equ_codact  AS codact
                FROM equipos AS e
                WHERE e.id_equipo ='$idequipo'";
            $respuesta = mysqli_query($conexion,$sql);
            $equipos = mysqli_fetch_array($respuesta);
            $datos = array(
                'actidequipo'  => $equipos['actidequipo'],
                'codact'    => $equipos['codact'],
            );
            return $datos;
        }

        public function editarequipo($datos){
            $conexion = Conexion::conectar();
            $hoy = date("Y-m-d");
            $registro = 'MODIFICO';
            $modulo = 'EQUIPOS';
            //REGISTRO AUDITORIA
            $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall, bit_idsede) VALUES (?,?,?,?,?,?)";
            $query = $conexion->prepare($insertbitacora);
            $detalle = 'AL EQUIPO CON SERIAL ' . $datos['serial'];
            $query->bind_param("ssissi", $registro, $hoy, $datos['idoperador'], $modulo, $detalle, $datos['idsede']);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                //REGISTRO ACTUALIZACION
                $sql = "UPDATE equipos SET id_sede = ?, id_area = ?, id_tipequ = ?, equ_marca = ?, equ_modelo = ?, equ_tipram = ?, equ_ram = ?, equ_proce = ?, equ_tipdis = ?, equ_capdis = ?, equ_grafica = ?, equ_serial = ?, equ_nomequ = ?, equ_mac = ? WHERE id_equipo = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('iiisssssssssssi', $datos['idsede'], $datos['idarea'], $datos['idtipequ'], $datos['marca'], $datos['modelo'], $datos['tipram'], $datos['ram'], $datos['procesa'], $datos['tipdis'], $datos['capdis'], $datos['grafic'], $datos['serial'], $datos['nomequ'], $datos['mac'], $datos['idequipo']);
                $respuesta = $query->execute();
                $query->close();
            }
            return $respuesta;
        }

        public function agregarmantenimiento($datos){
            //REGISTRO DEL EQUIPO A LA BD
            $conexion = Conexion::conectar();
            $hoy = date("Y-m-d");
            $sql = "INSERT INTO mantenimientos (id_operador, id_area, id_equipo, id_usuario, mat_detalle, mat_fecope) VALUES( ?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiiss", $datos['idoperador'], $datos['idarea'], $datos['idequipo'], $datos['idpersona'], $datos['detall'], $hoy);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                $registro = 'REGISTRO';
                $modulo = 'MANTENIMIENTOS';
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?,?,?,?,?)";
                $query = $conexion->prepare($insertbitacora);
                $detalle = 'EL MANTENIMIENTO AL EQUIPO ' . $datos['nombre'] . ' CON SERIAL ' . $datos['serial'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
    }

?>
