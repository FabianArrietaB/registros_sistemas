<?php
    include "../../models/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    // Do Prepared Query
    
    // Do a quick fetchall on the results
    $respuesta = mysqli_query($conexion, $query);
    $list = array();
    while ($r = $respuesta->fetch_object()){
        $data[] = $r;
    }
    // return the result in json
    echo json_encode($data);
    ?>