<?php
    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    $idfolder = $_POST['idfolder'];
    echo json_encode($Contraseñas->detallefolder($idfolder));
?>