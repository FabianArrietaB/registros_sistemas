<?php
    include "conexion.php";

    class Ventas extends Conexion {

        public function datosventas(){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                MONTH(v.ven_feccom) as date,
                v.ven_valor as valor,
                SUM(v.ven_valor) as valtot
                from ventas as v
                GROUP BY date";
            $respuesta = mysqli_query($conexion,$sql);
            $datos = array();
            foreach ($respuesta as $row) {
                $datos[] = $row;
            }
            return json_encode($datos);
        }

        public function agregarpresupuesto($datos){
            $conexion = Conexion::conectar();
            //AGREGAR COMPRA A LA BD
            $sql = "INSERT INTO presupuesto (id_operador, pre_valor, pre_fecope) VALUES( ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $hoy = date("Y-m-d");
            $query->bind_param("iss", $datos['idoperador'], $datos['presupuesto'], $hoy);
            $respuesta = $query->execute();
            if ( $respuesta > 0){
                //REGISTRO AUDITORIA
                $insertbitacora = "INSERT INTO bitacora (bit_tipeve, bit_fecope, bit_operador, bit_modulo, bit_detall) VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertbitacora);
                $registro = 'SE REGISTRO';
                $modulo = 'PRESUPUESTO';
                $detalle = 'EL PRESUPUESTO DE ' . $datos['presupuesto'];
                $query->bind_param("ssiss", $registro, $hoy, $datos['idoperador'], $modulo, $detalle);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
        
    }
?>