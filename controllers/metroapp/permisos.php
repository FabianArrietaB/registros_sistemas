<?php
    include "../../models/metroapp.php";
    $usuarios = new Metroapp();
    $idusuario = $_GET['id'];
    echo json_encode($usuarios->permisos($idusuario));
?>