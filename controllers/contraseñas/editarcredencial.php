<?php
   session_start();
   $datos = array(
    'idoperador'    => $_SESSION['usuario']['id'],
    "idcredencial"  => $_POST['idcredencial'],
    "idsede"        => $_POST['creidsedeu'],
    "idarea"        => $_POST['creidareau'],
    "dominio"       => $_POST['credominiou'],
    "usuario"       => $_POST['creusuariou'],
    "password"      => $_POST['crepasswordu'],
   );

   include "../../models/contraseñas.php";
   $Contraseñas = new Contraseñas();
   echo $Contraseñas->editarcredencial($datos);
?>