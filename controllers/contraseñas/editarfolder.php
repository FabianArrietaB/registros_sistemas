<?php
   session_start();
   $datos = array(
    'idoperador' => $_SESSION['usuario']['id'],
    "idfolder"   => $_POST['idfolder'],
    "nombre"     => $_POST['nombreu'],
    "password"   => $_POST['passwordu'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->editarfolder($datos);
?>