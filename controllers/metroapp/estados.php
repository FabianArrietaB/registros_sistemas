<?php
    session_start();
    include "../../models/metroapp.php";
    $Usuario   = new Metroapp();
    $idusuario  = $_POST['id'];
    $estado     = $_POST['estado'];
    echo $Usuario->estadousuarios($idusuario, $estado);
?>