<?php
    include "../../models/mantenimientos.php";
    $Equipos = new Equipos();
    $idequipo = $_POST['idequipo'];
    echo json_encode($Equipos->detalleactivo($idequipo));
?>