<?php
        include('../../vendor/autoload.php');
        include "../../models/conexion.php";

        use PhpOffice\PhpSpreadsheet\IOFactory;
        //CONEXION A BASE DA DATOS
        $con = new Conexion();
        $conexion = $con->conectarFomplus();
        // CREANDO EL ARCHIVO
        $excel = $_FILES['precios']['tmp_name'];
        // CARGANDO EL ARCHIVO
        $spreadsheet = IOFactory::load($excel);
        // SELECCIONAR LA PRIMERA HOJA
        $hoja = $spreadsheet->getActiveSheet();
        // TOTAL DE FILAS Y COLUMNAS
        $filas = $hoja->getHighestRow();
        $columnas = $hoja->getHighestColumn();
        // CREAR EL INDICE DEL ARCHIVO
        $index = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnas);
        //CONVIRTIENDO EN DATOS
        $data = array();

        for ($fila = 2; $fila <= $filas; $fila++) {

                $data[] = array(
                        'PRE_REFER'    => $hoja->getCell("A$fila")->GetValue(),
                        'PRE_CODIGO'   => $hoja->getCell("B$fila")->GetValue(),
                        'PRE_OBSERV'        => $hoja->getCell("C$fila")->GetValue(),
                        'PRE_VALOR'         => $hoja->getCell("D$fila")->GetValue(),
                );
        }

        $productos = 0;

        // INSERTAR PRODUCTOS
        foreach ($data as $value) {
        $stmt = $conexion->prepare("INSERT INTO LISPRE (PRE_REFER,
                                                                PRE_CODIGO,
                                                                PRE_OBSERV,
                                                                PRE_VALOR)
                                                        VALUES  (:PRE_REFER,
                                                                :PRE_CODIGO,
                                                                :PRE_OBSERV,
                                                                :PRE_VALOR);");
                $stmt -> bindParam(":PRE_REFER",       $value['PRE_REFER'],  PDO::PARAM_STR);
                $stmt -> bindParam(":PRE_CODIGO",      $value['PRE_CODIGO'],      PDO::PARAM_STR);
                $stmt -> bindParam(":PRE_OBSERV",      $value['PRE_OBSERV'], PDO::PARAM_STR);
                $stmt -> bindParam(":PRE_VALOR",       $value['PRE_VALOR'],       PDO::PARAM_STR);

                /*en esta condicion verificamos que si
                la cumple vaya contabilizando los productos */
                $productos += ($stmt->execute()) ? 1 : 0;
        }

        header('Content-Type: application/json');
        echo json_encode(array('productos' => $productos, 'data' => $data));

?>