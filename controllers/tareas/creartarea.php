<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "idasignado" => $_POST['idasignado'],
   "nivel"      => $_POST['nivel'],
   "detalle"    => $_POST['detalle'],
   "fecini"     => $_POST['fecini'],
   );

   include "../../models/tareas.php";
   $Tareas = new Tareas();
   echo $Tareas->creartarea($datos);
?>