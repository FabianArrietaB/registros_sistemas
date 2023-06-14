<?php
    include "../../models/tareas.php";
    $Tareas   = new Tareas();
    $idtarea  = $_POST['idtarea'];
    $estado   = $_POST['estado'];
    echo $Tareas->finalizada($idtarea, $estado);
?>