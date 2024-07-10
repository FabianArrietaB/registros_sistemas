<?php
   session_start();
   $datos = array(
    'idoperador'    => $_SESSION['usuario']['id'],
    "idsede"        => $_POST['creidsede'],
    "idarea"        => $_POST['creidarea'],
    "dominio"       => $_POST['credominio'],
    "usuario"       => $_POST['creusuario'],
    "password"      => $_POST['crepassword'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->agregarcredencial($datos);
?>