<?php
        include('../../vendor/autoload.php');
        include "../../models/conexion.php";

        use PhpOffice\PhpSpreadsheet\IOFactory;
        //CONEXION A BASE DA DATOS
        $con = new Conexion();
        $conexion = $con->conectarFomplus();
        // Ruta del archivo Excel
        $excel = $_FILES['files']['tmp_name'];
        // Cargar el archivo Excel
        $spreadsheet = IOFactory::load($excel);
        // Seleccionar la primera hoja
        $hoja = $spreadsheet->getActiveSheet();
        // Obtener el número total de filas y columnas
        $filas = $hoja->getHighestRow();
        $columnas = $hoja->getHighestColumn();
        // Convertir la letra de la última columna a un índice numérico
        $index = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($columnas);
        // Iterar sobre las filas y columnas para leer los datos
        $data = array();

        for ($fila = 2; $fila <= $filas; $fila++) {

                $data[] = array(
                        'REFERENCIA'    => $hoja->getCell("A$fila")->GetValue(),
                        'DESCRIPCION'   => $hoja->getCell("B$fila")->GetValue(),
                        'CODIGO'        => $hoja->getCell("C$fila")->GetValue(),
                        'COD_CLASE'     => $hoja->getCell("E$fila")->GetValue(),
                        'COD_GRUPO'     => $hoja->getCell("G$fila")->GetValue(),
                        'COD_LINEA'     => $hoja->getCell("I$fila")->GetValue(),
                        'UNDMEDIDA'     => $hoja->getCell("J$fila")->GetValue(),
                        'ULTCOMPRA'     => $hoja->getCell("K$fila")->GetValue(),
                        'VALORIVA'      => $hoja->getCell("L$fila")->GetValue(),
                        'VALVENTA'      => $hoja->getCell("M$fila")->GetValue()
                );
        }

        $productos = 0;

        // INSERTAR PRODUCTOS
        foreach ($data as $value) {
        $stmt = $conexion->prepare("INSERT INTO MAEINV (INV_REFER,
                                                                INV_NOMBRE,
                                                                INV_CODIGO,
                                                                INV_CLASE,
                                                                INV_GRUPO,
                                                                INV_LINEA,
                                                                INV_UNDMED,
                                                                INV_VALCOM,
                                                                INV_PORIVA,
                                                                INV_VALVEN)
                                                        VALUES  (:REFERENCIA,
                                                                :DESCRIPCION,
                                                                :CODIGO,
                                                                :COD_CLASE,
                                                                :COD_GRUPO,
                                                                :COD_LINEA,
                                                                :UNDMEDIDA,
                                                                :ULTCOMPRA,
                                                                :VALORIVA,
                                                                :VALVENTA);");
                $stmt -> bindParam(":REFERENCIA",   $value['REFERENCIA'],       PDO::PARAM_STR);
                $stmt -> bindParam(":DESCRIPCION",  $value['DESCRIPCION'],      PDO::PARAM_STR);
                $stmt -> bindParam(":CODIGO",       $value['CODIGO'],           PDO::PARAM_STR);
                $stmt -> bindParam(":COD_CLASE",    $value['COD_CLASE'],        PDO::PARAM_STR);
                $stmt -> bindParam(":COD_GRUPO",    $value['COD_GRUPO'],        PDO::PARAM_STR);
                $stmt -> bindParam(":COD_LINEA",    $value['COD_LINEA'],        PDO::PARAM_STR);
                $stmt -> bindParam(":UNDMEDIDA",    $value['UNDMEDIDA'],        PDO::PARAM_STR);
                $stmt -> bindParam(":ULTCOMPRA",    $value['ULTCOMPRA'],        PDO::PARAM_STR);
                $stmt -> bindParam(":VALORIVA",     $value['VALORIVA'],         PDO::PARAM_STR);
                $stmt -> bindParam(":VALVENTA",     $value['VALVENTA'],         PDO::PARAM_STR);

                /*en esta condicion verificamos que si
                la cumple vaya contabilizando los productos */
                $productos += ($stmt->execute()) ? 1 : 0;
        }

        header('Content-Type: application/json');
        echo json_encode(array('productos' => $productos, 'data' => $data));

?>