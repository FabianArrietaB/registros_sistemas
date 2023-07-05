<?php
   session_start();
   $datos = array(
      'idoperador'   => $_SESSION['usuario']['id'],
      "presupuesto"  => $_POST['presupuesto'],
   );

   include "../../models/historial.php";
   $Ventas = new Ventas();
   echo $Ventas->agregarpresupuesto($datos);
?>