<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "tipeqi"     => $_POST['tipeqi'],
   "idsede"     => $_POST['idsede'],
   "idarea"     => $_POST['idarea'],
   "marca"      => $_POST['marca'],
   "modelo"     => $_POST['modelo'],
   "tipram"     => $_POST['tipram'],
   "ram"        => $_POST['ram'],
   "procesa"    => $_POST['procesa'],
   "tipdis"     => $_POST['tipdis'],
   "capdis"     => $_POST['capdis'],
   "grafica"    => $_POST['grafica'],
   "serial"     => $_POST['serial'],
   "fecha"      => $_POST['fecha'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->crearequipo($datos);
?>