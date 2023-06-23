<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "idtipequ"   => $_POST['idtipequ'],
   "idsede"     => $_POST['idsede'],
   "idarea"     => $_POST['idarea'],
   "marca"      => $_POST['marca'],
   "modelo"     => $_POST['modelo'],
   "tipram"     => $_POST['tipram'],
   "ram"        => $_POST['ram'],
   "procesa"    => $_POST['procesa'],
   "tipdis"     => $_POST['tipdis'],
   "capdis"     => $_POST['capdis'],
   "grafic"     => $_POST['grafic'],
   "serial"     => $_POST['serial'],
   "nomequ"     => $_POST['nomequ'],
   "mac"        => $_POST['mac'],
   "fecha"      => $_POST['fecha'],
   "numfac"     => $_POST['numfac'],
   "proove"     => $_POST['proove'],
   "valor"      => $_POST['valor'],
   "detall"     => $_POST['detall'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->crearequipo($datos);
?>