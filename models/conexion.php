<?php
class Conexion{

   protected $dbh;

   public function conectar(){
      $servidor = "localhost";
      $usuario = "root";
      $password = "";
      $db = "sistemas";
      $conexion = mysqli_connect($servidor, $usuario, $password, $db);
      return $conexion;
   }

   // public function conectarbd(){
   //    $servidor = "SERVIDOR";
   //    $usuario = "si";
   //    $password = ".Metropolis1943..";
   //    # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
   //    $db = "METROCERAMICA";
   //    $connectinfo = array( "Database"=>$db, "UID"=>$usuario, "PWD"=>$password);
   //    $conexion = sqlsrv_connect($servidor, $connectinfo);
   //    return $conexion;

   // }
}
?>