<?php
    session_start();
    include "../../models/metroapp.php";
    $Usuario   = new Metroapp();
    $idusuario  = $_POST['id'];
    $estado     = $_POST['estado'];
    $modulo     = $_POST['modulo'];
    echo $Usuario->addremove($idusuario, $estado, $modulo);
?>