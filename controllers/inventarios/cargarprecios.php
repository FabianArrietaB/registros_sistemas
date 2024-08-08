<?php
        include('../../vendor/autoload.php');
        include "../../models/conexion.php";

        use PhpOffice\PhpSpreadsheet\IOFactory;
        //CONEXION A BASE DA DATOS
        $con = new Conexion();
        $conexion = $con->conectarFomplus();
        // CREANDO EL ARCHIVO
        $excel = $_FILES['files']['tmp_name'];
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
        $data2 = array();

        for ($fila = 2; $fila <= $filas; $fila++) {

                $data[] = array(
                        'REFERENCIA'    => $hoja->getCell("A$fila")->GetValue(),
                        'DESCRIPCION'   => $hoja->getCell("B$fila")->GetValue(),
                        'NOMBRE'        => $hoja->getCell("C$fila")->GetValue(),
                        'VALOR'         => $hoja->getCell("D$fila")->GetValue(),
                );
        }

        $productos = 0;

        // INSERTAR PRODUCTOS
        foreach ($data as $value) {
        $stmt = $conexion->prepare("INSERT INTO LISPRE (PRE_REFER,
                                                                PRE_CODIGO,
                                                                PRE_OBSERV,
                                                                PRE_VALOR)
                                                        VALUES  (:REFERENCIA,
                                                                :CODIGO,
                                                                :DESCRIPCION,
                                                                :VALOR);");
                $stmt -> bindParam(":REFERENCIA",  $value['REFERENCIA'],  PDO::PARAM_STR);
                $stmt -> bindParam(":CODIGO",      $value['CODIGO'],      PDO::PARAM_STR);
                $stmt -> bindParam(":DESCRIPCION", $value['DESCRIPCION'], PDO::PARAM_STR);
                $stmt -> bindParam(":VALOR",       $value['VALOR'],       PDO::PARAM_STR);

                /*en esta condicion verificamos que si
                la cumple vaya contabilizando los productos */
                $productos += ($stmt->execute()) ? 1 : 0;
                $total = $productos / 3;
        }

        header('Content-Type: application/json');
        echo json_encode(array('productos' => $total, 'data' => $data));

?>