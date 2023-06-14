<?php
   session_start();
   $datos = array(
    "idtarea"   => $_POST['idtarea'],
    "fecrea"   => $_POST['fecrea'],
   );
   include "../../models/tareas.php";
   $Tareas = new Tareas();
   echo $Tareas->soluciontarea($datos);
?>