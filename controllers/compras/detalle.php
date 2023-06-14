<?php
    include "../../models/compras.php";
    $Compras = new Compras();
    $idventa = $_POST['idventa'];
    echo json_encode($Compras->detallecompras($idventa));
?>