<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      'idequipo'   => $_POST['idequipo'],
      'idtipequ'   => $_POST['idtipequu'],
      'idsede'     => $_POST['idsedeu'],
      'idarea'     => $_POST['idareau'],
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
      'fecha'      => $_POST['fechau'],
   );

   include '../../models/mantenimientos.php';
   $Equipos = new Equipos();
   echo $Equipos->editarequipo($datos);
?>