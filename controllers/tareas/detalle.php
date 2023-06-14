<?php
    include "../../models/tareas.php";
    $Tareas = new Tareas();
    $idtarea = $_POST['idtarea'];
    echo json_encode($Tareas->detalletarea($idtarea));
?>