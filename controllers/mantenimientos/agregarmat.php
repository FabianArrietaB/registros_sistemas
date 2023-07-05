<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "idarea"     => $_POST['idarea'],
   "idequipo"   => $_POST['idequipo'],
   "idpersona"  => $_POST['idpersona'],
   "nombre"     => $_POST['nombre'],
   "serial"     => $_POST['serial'],
   "detall"     => $_POST['detall'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->agregarmantenimiento($datos);
?>