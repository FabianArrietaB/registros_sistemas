<?php
   session_start();
   $datos = array(
   'idoperador' => $_SESSION['usuario']['id'],
   "idsede"     => $_POST['idsede'],
   "idarea"     => $_POST['idarea'],
   "cantid"     => $_POST['cantid'],
   "nompro"     => $_POST['nompro'],
   "serial"     => $_POST['serial'],
   "numfac"     => $_POST['numfac'],
   "proove"     => $_POST['proove'],
   "detall"     => $_POST['detall'],
   "feccom"     => $_POST['feccom'],
   );

   include "../../models/compras.php";
   $Compras = new Compras();
   echo $Compras->agregarcompra($datos);
?>