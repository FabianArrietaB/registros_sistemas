<?php
    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    $idclave = $_POST['idclave'];
    echo json_encode($Contraseñas->detalleclave($idclave));
?>