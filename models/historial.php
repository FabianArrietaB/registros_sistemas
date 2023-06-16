<?php
    include "conexion.php";

    class Ventas. extends Conexion {

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
    }
?>