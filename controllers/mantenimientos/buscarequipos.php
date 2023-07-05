<?php
    include "../../models/conexion.php";
    $con = new Conexion();
    
    $conexion = $con->conectar();
    $search = strip_tags(trim($_GET['equipo']));
    // Do Prepared Query
    $query = "SELECT * FROM equipos WHERE equ_codact LIKE '%$search%' || equ_nomequ LIKE '%$search%' || equ_serial LIKE '%$search%' LIMIT 40";
    // Do a quick fetchall on the results
    $respuesta = mysqli_query($conexion, $query);
    $list = array();
    while ($list=mysqli_fetch_array($respuesta)){
        $data[] = array(
            'id' => $list['id_equipo'],
            'text' => $list['equ_nomequ'],
            'marca' => $list['equ_marca'],
            'modelo' => $list['equ_modelo'],
            'serial' => $list['equ_serial']
        );
    }
    // return the result in json
    echo json_encode($data);
    ?>