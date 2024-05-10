<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      'idequipo'   => $_POST['idequipou'],
      'idsede'     => $_POST['idsedeu'],
      'idarea'     => $_POST['idareau'],
      'idtipequ'   => $_POST['idtipequu'],
      'marca'      => $_POST['marcau'],
      'modelo'     => $_POST['modelou'],
      'tipram'     => $_POST['tipramu'],
      'ram'        => $_POST['ramu'],
      'procesa'    => $_POST['procesau'],
      'tipdis'     => $_POST['tipdisu'],
      'capdis'     => $_POST['capdisu'],
      'grafic'     => $_POST['graficu'],
      'serial'     => $_POST['serialu'],
      'nomequ'     => $_POST['nomequu'],
      'mac'        => $_POST['macu'],
      'estado'     => $_POST['estado'],
   );

   include '../../models/mantenimientos.php';
   $Equipos = new Equipos();
   echo $Equipos->editarequipo($datos);
?>