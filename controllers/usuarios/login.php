<?php
    session_start();
    include "../../models/usuarios.php";
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);
    $Usuarios = new Usuarios();
    echo $Usuarios->ingresousuario($usuario, $password);

?>