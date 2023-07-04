<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        "idtipo"     => $_POST['idtipo'],
        "equipo"     => $_POST['equipo'],
        "usuario"    => $_POST['usuario'],
        "password"   => $_POST['password'],
        "nonwif"     => $_POST['nonwif'],
        "calwif"     => $_POST['calwif'],
        "marca"      => $_POST['marca'],
        "modelo"     => $_POST['modelo'],
        "ip"         => $_POST['ip'],
        "patron"     => $_POST['patron'],
        "serial"     => $_POST['serial'],
    );

    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    echo $Contraseñas->agregarclave($datos);
?>