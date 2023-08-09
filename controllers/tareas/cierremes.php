<?php
    session_start();
    $datos = array(
        'idoperador' => $_SESSION['usuario']['id'],
    );
    include "../../models/tareas.php";
    $Tareas = new Tareas();
    echo $Tareas->cierremes($datos);
?>