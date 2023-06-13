<?php
    session_start();
    $datos = Array(
        'idoperador' => $_SESSION['usuario']['id'],
        "idtipequ"   => $_POST['idtipequu'],
        "idsede"     => $_POST['idsedeu'],
        "idarea"     => $_POST['idareau'],
        "marca"      => $_POST['marcau'],
        "modelo"     => $_POST['modelou'],
        "tipram"     => $_POST['tipramu'],
        "ram"        => $_POST['ramu'],
        "procesa"    => $_POST['procesau'],
        "tipdis"     => $_POST['tipdisu'],
        "capdis"     => $_POST['capdisu'],
        "grafica"    => $_POST['graficau'],
        "fecha"      => $_POST['fechau'],
        "serial"     => $_POST['serialu'],
        "idequipo"   => $_POST['idequipo'],
    );
    include "../../models/mantenimientos.php";
    $Equipos = new Equipos();
    echo $Equipos->editarequipo($datos);
?>