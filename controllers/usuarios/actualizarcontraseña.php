<?php
    include "../../models/usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "password" => sha1($_POST['newpass']),
        "idusuario" =>$_POST['$idusuario']
    );
    echo $Usuarios->cambiocontraseña($datos);
?>