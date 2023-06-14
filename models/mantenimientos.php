<?php
    include "conexion.php";

    class Equipos extends Conexion {

        public function crearequipo($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO equipos (id_operador,
                                        id_sede,
                                        id_area,
                                        id_tipequ,
                                        equ_marca,
                                        equ_modelo,
                                        equ_tipram,
                                        equ_ram,
                                        equ_proce,
                                        equ_tipdis,
                                        equ_capdis,
                                        equ_grafica,
                                        equ_serial,
                                        equ_nomequ,
                                        equ_mac,
                                        equ_fecope)
            VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iiiissssssssssss",
                                $datos['idoperador'],
                                $datos['idsede'],
                                $datos['idarea'],
                                $datos['idtipequ'],
                                $datos['marca'],
                                $datos['modelo'],
                                $datos['tipram'],
                                $datos['ram'],
                                $datos['procesa'],
                                $datos['tipdis'],
                                $datos['capdis'],
                                $datos['grafic'],
                                $datos['serial'],
                                $datos['nomequ'],
                                $datos['mac'],
                                $datos['fecha']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function agregaractivo($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE equipos SET equ_codact = ? WHERE id_equipo = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('si',
             $datos['codact'],
             $datos['idequipo']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function detalleequipo($idequipo){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                e.id_equipo   AS idequipo,
                e.id_sede     AS idsede,
                e.id_area     AS idarea,
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
                INNER JOIN areas AS a ON a.id_area = e.id_area
                WHERE e.id_equipo ='$idequipo'";
            $respuesta = mysqli_query($conexion,$sql);
            $equipos = mysqli_fetch_array($respuesta);
            $datos = array(
                'idequipo'  => $equipos['idequipo'],
                'idsede'    => $equipos['idsede'],
                'idarea'    => $equipos['idarea'],
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

        public function editarequipo($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE equipos SET id_operador = ?,
                                        id_sede = ?,
                                        id_area = ?,
                                        id_tipequ = ?,
                                        equ_marca = ?,
                                        equ_modelo = ?,
                                        equ_tipram = ?,
                                        equ_ram = ?,
                                        equ_proce = ?,
                                        equ_tipdis = ?,
                                        equ_capdis = ?,
                                        equ_grafica = ?,
                                        equ_serial = ?,
                                        equ_nomequ = ?,
                                        equ_mac = ?,
                                        equ_fecope = ?
                                        WHERE id_equipo = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('iiiissssssssssssi',
                                $datos['idoperador'],
                                $datos['idsede'],
                                $datos['idarea'],
                                $datos['idtipequ'],
                                $datos['marca'],
                                $datos['modelo'],
                                $datos['tipram'],
                                $datos['ram'],
                                $datos['procesa'],
                                $datos['tipdis'],
                                $datos['capdis'],
                                $datos['grafic'],
                                $datos['serial'],
                                $datos['nomequ'],
                                $datos['mac'],
                                $datos['fecha'],
                                $datos['idequipo']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

     
    }

?>
