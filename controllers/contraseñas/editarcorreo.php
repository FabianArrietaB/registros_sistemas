<?php
   session_start();
   $datos = array(
    'idoperador' => $_SESSION['usuario']['id'],
    "idcorreo"   => $_POST['idcorreo'],
    "correo"     => $_POST['correou'],
    "idsede"     => $_POST['idsedeu'],
    "idarea"     => $_POST['idareau'],
    "passw"      => $_POST['passwu'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->editarcorreo($datos);
?>