<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "idarea"     => $_POST['matidarea'],
   "idequipo"   => $_POST['matidequipo'],
   "idpersona"  => $_POST['matidpersona'],
   "nombre"     => $_POST['matnombre'],
   "serial"     => $_POST['matserial'],
   "detall"     => $_POST['matdetall'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregarmantenimiento($datos);
?>