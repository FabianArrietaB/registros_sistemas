<?php
    include "../../models/compras.php";
    $Ventas = new Ventas();
    echo json_encode($Ventas->datosventas($datos));
?>