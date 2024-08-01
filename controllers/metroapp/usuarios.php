<?php
    include "../../models/metroapp.php";
    $usuarios = new Metroapp();
    echo json_encode($usuarios->usuarios());
?>