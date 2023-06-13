<?php
   session_start();
   $datos = array(
   "idequipo"  => $_POST['idequipo'],
   "codact"    => $_POST['codactu'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregaractivo($datos);
?>