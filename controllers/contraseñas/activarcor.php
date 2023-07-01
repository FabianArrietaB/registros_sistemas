<?php
    include "../../models/contraseñas.php";
    $Contraseñas   = new Contraseñas();
    $idcorreo  = $_POST['idcorreo'];
    $estado    = $_POST['estado'];
    echo $Contraseñas->activarcorreo($idcorreo, $estado);
?>