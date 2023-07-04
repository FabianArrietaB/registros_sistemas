<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
        "idclave"    => $_POST['idclave'],
        "idtipo"     => $_POST['idtipou'],
        "equipo"     => $_POST['equipou'],
        "usuario"    => $_POST['usuariou'],
        "password"   => $_POST['passwordu'],
        "nonwif"     => $_POST['nonwifu'],
        "calwif"     => $_POST['calwifu'],
        "ip"         => $_POST['ipu'],
        "marca"      => $_POST['marcau'],
        "modelo"     => $_POST['modelou'],
        "patron"     => $_POST['patronu'],
        "serial"     => $_POST['serialu'],
    );

    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    echo $Contraseñas->editarclave($datos);
?>