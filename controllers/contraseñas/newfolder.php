<?php
   session_start();
   $datos = array(
      'idoperador' => $_SESSION['usuario']['id'],
      "nombre"     => $_POST['nombre'],
      "password"   => $_POST['password'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->agregarfolder($datos);
?>