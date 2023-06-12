<?php
   session_start();
   $datos = array(
   "idequipo"  => $_POST['idequipo'],
   "codact"  => $_POST['codact'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregaractivo($datos);
?>