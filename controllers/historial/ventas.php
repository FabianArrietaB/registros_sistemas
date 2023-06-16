<?php
    include "../../models/compras.php";
    $Historial = new Historial();
    echo json_encode($Historial->datosventas($datos));
?>