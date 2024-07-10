<?php
    include "../../models/contraseñas.php";
    $Contraseñas = new Contraseñas();
    $idcredencial = $_POST['idcredencial'];
    echo json_encode($Contraseñas->detallecredencial($idcredencial));
?>