<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "equipoid"   => $_POST['equipoid'],
   "codact"     => $_POST['codactu'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregaractivo($datos);
?>