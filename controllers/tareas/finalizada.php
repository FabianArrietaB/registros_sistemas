<?php
    session_start();
    include "../../models/tareas.php";
    $Tareas   = new Tareas();
    $idoperador = $_SESSION['usuario']['id'];
    $idtarea  = $_POST['idtarea'];
    $estado   = $_POST['estado'];
    echo $Tareas->finalizada($idtarea, $estado);
?>