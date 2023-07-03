<?php
    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    $idcorreo = $_POST['idcorreo'];
    echo json_encode($Contraseñas->detallecorreo($idcorreo));
?>