<?php
    include "../../models/inventarios.php";
    $Inventario = new Inventario();
    $referencia = $_GET['referencia'];
    echo json_encode($Inventario->precios($referencia));
?>