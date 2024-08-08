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