<?php
    include "../../models/inventarios.php";
    $inventario = new Inventario();
    echo json_encode($inventario->productos());
?>