<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      "idarea"     => $_POST['idarea'],
      "idsede"     => $_POST['idsede'],
      "correo"     => $_POST['correo'],
      "password"   => $_POST['password'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->agregarcorreo($datos);
?>