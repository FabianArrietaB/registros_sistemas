<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      "idtipequ"   => $_POST['idtipequcel'],
      "idsede"     => $_POST['idsedecel'],
      "idarea"     => $_POST['idareacel'],
      "marca"      => $_POST['marcacel'],
      "modelo"     => $_POST['modelocel'],
      "ram"        => $_POST['ramcel'],
      "procesa"    => $_POST['procesacel'],
      "capdis"     => $_POST['capdiscel'],
      "serial"     => $_POST['serialcel'],
      "nomequ"     => $_POST['nomequcel'],
      "mac"        => $_POST['maccel'],
      "fecha"      => $_POST['fechacel'],
      "imei1"     => $_POST['imei1'],
      "imei2"     => $_POST['imei2'],
      "numfac"     => $_POST['numfaccel'],
      "proove"     => $_POST['proovecel'],
      "valor"      => $_POST['valorcel'],
      "detall"     => $_POST['detallcel'],
   );

   include "../../models/mantenimientos.php";
   $Equipos = new Equipos();
   echo $Equipos->crearcelular($datos);
?>