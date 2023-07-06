<?php
   session_start();
   $datos = array(
   'idoperador'  => $_SESSION['usuario']['id'],
   "actidequipo" => $_POST['actidequipo'],
   "codact"      => $_POST['codactu'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregaractivo($datos);
?>