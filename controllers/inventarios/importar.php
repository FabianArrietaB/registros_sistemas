<?php
        include('../../vendor/autoload.php');
        include "../../models/conexion.php";

        use PhpOffice\PhpSpreadsheet\IOFactory;
        $con = new Conexion();
        $conexion = $con->conectarBD();
        // Ruta del archivo Excel
        $archivo_excel = $_FILES['files']['tmp_name'];
        // Cargar el archivo Excel
        $spreadsheet = IOFactory::load($archivo_excel);
        // Seleccionar la primera hoja
        $hoja = $spreadsheet->getActiveSheet();
        // Obtener el número total de filas y columnas
        $total_filas = $hoja->getHighestRow();
        $total_columnas = $hoja->getHighestColumn();
        // Convertir la letra de la última columna a un índice numérico
        $total_columnas_index = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($total_columnas);
        // Iterar sobre las filas y columnas para leer los datos
        $data = array();

        for ($fila = 2; $fila <= $total_filas; $fila++) {

                $data[] = array(
                        'REFERENCIA'    => $hoja->getCell("A$fila")->GetValue(),
                        'DESCRIPCION'   => $hoja->getCell("B$fila")->GetValue(),
                        'CODIGO'        => $hoja->getCell("C$fila")->GetValue(),
                        'COD_CLASE'     => $hoja->getCell("E$fila")->GetValue(),
                        'COD_GRUPO'     => $hoja->getCell("G$fila")->GetValue(),
                        'COD_LINEA'     => $hoja->getCell("I$fila")->GetValue(),
                        'UNDMED'        => $hoja->getCell("J$fila")->GetValue()
                );
        }

        $productos = 0;

        // haciendo insert
        foreach ($data as $value) {
        $stmt = $conexion->prepare("INSERT INTO carga_productos (REFERENCIA,
                                                                DESCRIPCION,
                                                                CODIGO,
                                                                COD_CLASE,
                                                                COD_GRUPO,
                                                                COD_LINEA,
                                                                UNDMED)
                                                        VALUES  (:REFERENCIA,
                                                                :DESCRIPCION,
                                                                :CODIGO,
                                                                :COD_CLASE,
                                                                :COD_GRUPO,
                                                                :COD_LINEA,
                                                                :UNDMED);");
                $stmt -> bindParam(":REFERENCIA",   $value['REFERENCIA'],       PDO::PARAM_STR);
                $stmt -> bindParam(":DESCRIPCION",  $value['DESCRIPCION'],      PDO::PARAM_STR);
                $stmt -> bindParam(":CODIGO",       $value['CODIGO'],           PDO::PARAM_STR);
                $stmt -> bindParam(":COD_CLASE",    $value['COD_CLASE'],        PDO::PARAM_STR);
                $stmt -> bindParam(":COD_GRUPO",    $value['COD_GRUPO'],        PDO::PARAM_STR);
                $stmt -> bindParam(":COD_LINEA",    $value['COD_LINEA'],        PDO::PARAM_STR);
                $stmt -> bindParam(":UNDMED",       $value['UNDMED'],           PDO::PARAM_STR);

                /*en esta condicion verificamos que si
                la cumple vaya contabilizando los productos */
                $productos += ($stmt->execute()) ? 1 : 0;
        }

        header('Content-Type: application/json');
        echo json_encode(array('productos' => $productos, 'data' => $data));

?>