<?php
   session_start();
   $datos = array(
    'idoperador' => $_SESSION['usuario']['id'],
    "idcorreo"   => $_POST['idcorreo'],
    "password"     => $_POST['passwordu'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->cambiopassword($datos);
?>