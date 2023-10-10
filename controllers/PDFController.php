<?php

namespace Controllers;

use FPDF;
use Model\Pesos;
use Model\Pesos2;
use Model\Productos;
use Model\Productos2;
use Model\Servicio;

require_once(__DIR__ . '/../includes/fpdf/fpdf.php');

class PDFController
{
    public static function index()
    {
        // Crear una instancia de Servicio
        $codigoFactura = $_POST['codigo_factura'];
        $nombrePersona = $_POST['cliente'];
        $fecha = $_POST['fecha'];
        $pesosSeleccionados = $_POST['pesos_seleccionados'];
        $productosSeleccionados = $_POST['productos_seleccionados'];
        $pesosSeleccionados2 = $_POST['pesos2_seleccionados'];
        $productosSeleccionados2 = $_POST['productos2_seleccionados'];
        $rfc = $_POST['rfc'];
        $total = 0;
        $totalIVA = 0;



        // Crear una instancia de FPDF

        $pdf = new FPDF('L');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // LOGO
        $pdf->Image('../src/img/siemprejuntos.jpg', -10, -10, 120, 67);

        // Título de la factura
        $pdf->Cell(110, 10, '', 0, 0);
        $pdf->Cell(80, 5, 'REMISION', 0, 1, 'R');
        $pdf->Cell(110, 10, '', 0, 0);
        $pdf->Cell(83.3, 10, 'Folio, Serie:', 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(10, 10, 'LPR', 0, 0, 'R');
        $pdf->Cell(10, 10, $codigoFactura, 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(110, 10, '', 0, 0);
        $pdf->Cell(84.2, 5, 'Fecha: ', 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(22.2, 5, $fecha, 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 12);


        // Desplazar la posición vertical para dejar espacio para la tabla
        $pdf->SetY(40); // Ajusta la posición vertical según tus necesidades

        $pdf->Cell(140, 7, 'Emisor: ', 0, 0);
        $pdf->Cell(22, 7, 'Receptor: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(10, 7, $nombrePersona, 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(140, 5, 'JOEL ARTURO SOTO MANRIQUEZ', 0, 0);
        $pdf->Cell(12, 7, 'RFC: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(12, 7, $rfc, 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(12, 5, 'RFC: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 5, 'SOMJ9707247Z1', 0, 1);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(34, 7, 'Regimen Fiscal: ', 0, 0);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 7, mb_convert_encoding('621 Incoropración Fiscal', 'ISO-8859-1'), 0, 1);

        // Agregar la tabla debajo de la imagen

        $pdf->Cell(0, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 7); // Establecer fuente en negritas para los encabezados de columna
        $pdf->Cell(15, 7, 'CANTIDAD', 1, 0, 'C'); // Ancho: 20, Alineación: Centro
        $pdf->Cell(70, 7, 'DESCRIPCION', 1, 0, 'C'); // Ancho: 50, Alineación: Centro
        $pdf->Cell(25, 7, 'LOTE CADUCIDAD', 1, 0, 'C'); // Ancho: 30, Alineación: Centro
        $pdf->Cell(30, 7, 'VALOR UNITARIO', 1, 0, 'C'); // Ancho: 30, Alineación: Centro
        $pdf->Cell(30, 7, 'PRECIO PUBLICO', 1, 0, 'C'); // Ancho: 30, Alineación: Centro
        $pdf->Cell(20, 7, 'DESCUENTO', 1, 0, 'C'); // Ancho: 20, Alineación: Centro
        $pdf->Cell(20, 7, 'IMPUESTOS', 1, 0, 'C'); // Ancho: 20, Alineación: Centro
        $pdf->Cell(30, 7, 'IMPORTE', 1, 1, 'C');

        // Agregar los productos seleccionados
        $pdf->SetFont('Arial', '', 9); // Cambiar a una fuente más pequeña

        foreach ($pesosSeleccionados as $pesoId) {
            // Obtener la cantidad y el producto desde el formulario (antes de guardar en la base de datos)
            $cantidadKey = 'cantidad_' . $pesoId;
            $cantidad = isset($_POST[$cantidadKey]) ? intval($_POST[$cantidadKey]) : 1;
            $peso = Pesos::find($pesoId); // Suponiendo que existe un método "find" en el modelo pesos

            if ($peso) {
                $precioSeleccionado = ($_POST['tipo-precio'] === 'publico') ? $peso->precioPublico : $peso->precio;
                $precioSinIVA = $precioSeleccionado / 1.16;
                $IVA = ($precioSinIVA * 0.16) * $cantidad;
                $IVA = number_format($IVA, 2);
                $import = $precioSinIVA * $cantidad;
                

                $pdf->Cell(15, 5, $cantidad, 1, 0, 'C');
                $pdf->Cell(70, 5, mb_convert_encoding($peso->descripcion, 'ISO-8859-1'), 1, 0, 'C');
                $pdf->Cell(25, 5, ' | ', 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($precioSinIVA, 2), 1, 0, 'C'); // Formatea el valor con 2 decimales
                $pdf->Cell(30, 5, '$' .  $precioSeleccionado, 1, 0, 'C');
                $pdf->Cell(20, 5, '$0', 1, 0, 'C');
                $pdf->Cell(20, 5, '$' . $IVA, 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($import, 2), 1, 1, 'C');

                $subtotal = $import;
                $total += $subtotal;
                $totalIVA += $IVA;
            }
        }

        foreach ($pesosSeleccionados2 as $pesoId2) {
            // Obtener la cantidad y el producto desde el formulario (antes de guardar en la base de datos)
            $cantidadKey = 'cantidad_' . $pesoId2;
            $cantidad = isset($_POST[$cantidadKey]) ? intval($_POST[$cantidadKey]) : 1;
            $peso2 = Pesos2::find($pesoId2); // Suponiendo que existe un método "find" en el modelo pesos

            if ($peso2) {
                $precioSeleccionado = ($_POST['tipo-precio'] === 'publico') ? $peso2->precioPublico : $peso2->precio;
                $precioSinIVA = $precioSeleccionado / 1.16;
                $IVA = ($precioSinIVA * 0.16) * $cantidad;
                $IVA = number_format($IVA, 2);
                $import = $precioSinIVA * $cantidad;
                

                $pdf->Cell(15, 5, $cantidad, 1, 0, 'C');
                $pdf->Cell(70, 5, mb_convert_encoding($peso2->descripcion, 'ISO-8859-1'), 1, 0, 'C');
                $pdf->Cell(25, 5, ' | ', 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($precioSinIVA, 2), 1, 0, 'C'); // Formatea el valor con 2 decimales
                $pdf->Cell(30, 5, '$' .  $precioSeleccionado, 1, 0, 'C');
                $pdf->Cell(20, 5, '$0', 1, 0, 'C');
                $pdf->Cell(20, 5, '$' . $IVA, 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($import, 2), 1, 1, 'C');

                $subtotal = $import;
                $total += $subtotal;
                $totalIVA += $IVA;
            }
        }

        foreach ($productosSeleccionados as $productoId) {
            // Obtener la cantidad y el producto desde el formulario (antes de guardar en la base de datos)
            $cantidadKey = 'cantidad_' . $productoId;
            $cantidad = isset($_POST[$cantidadKey]) ? intval($_POST[$cantidadKey]) : 1;
            $producto = Productos::find($productoId); // Suponiendo que existe un método "find" en el modelo Productos
        
            if ($producto) {
                $precioSeleccionado = ($_POST['tipo-precio'] === 'publico') ? $producto->precioPublico : $producto->precio;
                $precioSinIVA = $precioSeleccionado / 1.16;
                $IVA = ($precioSinIVA * 0.16) * $cantidad;
                $IVA = number_format($IVA, 2);
                $import = $precioSinIVA * $cantidad;
        
                $pdf->Cell(15, 5, $cantidad, 1, 0, 'C');
                $pdf->Cell(70, 5, mb_convert_encoding($producto->descripcion, 'ISO-8859-1'), 1, 0, 'C');
                $pdf->Cell(25, 5, ' | ', 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($precioSinIVA, 2), 1, 0, 'C'); // Formatea el valor con 2 decimales
                $pdf->Cell(30, 5, '$' . number_format($precioSeleccionado, 2), 1, 0, 'C');
                $pdf->Cell(20, 5, '$0', 1, 0, 'C');
                $pdf->Cell(20, 5, '$' . $IVA, 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($import, 2), 1, 1, 'C');
        
                $subtotal = $import;
                $total += $subtotal;
                $totalIVA += $IVA;
            }
        }

        foreach ($productosSeleccionados2 as $productoId2) {
            // Obtener la cantidad y el producto desde el formulario (antes de guardar en la base de datos)
            $cantidadKey = 'cantidad_' . $productoId2;
            $cantidad = isset($_POST[$cantidadKey]) ? intval($_POST[$cantidadKey]) : 1;
            $producto2 = Productos2::find($productoId2); // Suponiendo que existe un método "find" en el modelo Productos
        
            if ($producto2) {
                $precioSeleccionado = ($_POST['tipo-precio'] === 'publico') ? $producto2->precioPublico : $producto2->precio;
                $precioSinIVA = $precioSeleccionado / 1.16;
                $IVA = ($precioSinIVA * 0.16) * $cantidad;
                $IVA = number_format($IVA, 2);
                $import = $precioSinIVA * $cantidad;
        
                $pdf->Cell(15, 5, $cantidad, 1, 0, 'C');
                $pdf->Cell(70, 5, mb_convert_encoding($producto2->descripcion, 'ISO-8859-1'), 1, 0, 'C');
                $pdf->Cell(25, 5, ' | ', 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($precioSinIVA, 2), 1, 0, 'C'); // Formatea el valor con 2 decimales
                $pdf->Cell(30, 5, '$' . number_format($precioSeleccionado, 2), 1, 0, 'C');
                $pdf->Cell(20, 5, '$0', 1, 0, 'C');
                $pdf->Cell(20, 5, '$' . $IVA, 1, 0, 'C');
                $pdf->Cell(30, 5, '$' . number_format($import, 2), 1, 1, 'C');
        
                $subtotal = $import;
                $total += $subtotal;
                $totalIVA += $IVA;
            }
        }

        
        
        
        // Calcular el total con IVA
        $TOTALTOTAL = $total + $totalIVA;

        $pdf->Cell(10, 10, '', 0, 1);
        // Mostrar el total con IVA al final del PDF
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(220, 7, 'Subtotal:', 0, 0, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(30, 7, '$' . number_format($total, 2), 0, 1, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(220, 7, 'Descuentos:', 0, 0, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(30, 7, '$0', 0, 1, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(220, 7, 'IVA:', 0, 0, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(30, 7, '$' . number_format($totalIVA, 2), 0, 1, 'R'); // Alinear a la derecha
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(220, 7, 'Total:', 0, 0, 'R'); // Alinear a la derecha
        $pdf->Cell(30, 7, '$' . number_format($TOTALTOTAL, 2), 0, 1, 'R'); // Alinear a la derecha


        // Generar y guardar el PDF


        // Crear una instancia de Servicio
        $servicio = new Servicio();
        $servicio->fecha = date('Y-m-d');
        $servicio->peso_kg = 0;
        $servicio->estado = 1;

        $pdfFilePath = 'remision/' . $nombrePersona . '_LPR_' .  $codigoFactura . '.pdf'; // Ruta donde se guardará el PDF


        // Actualizar el campo "pdf" en la instancia de Servicio después de guardar el PDF
        $servicio->pdf = $pdfFilePath;

        // Guardar la instancia de Servicio en la base de datos
        $ID_generado = $servicio->guardar();



        if ($ID_generado) {
            // Mostrar el ID generado en el P

            // Mostrar el PDF en pantalla
            $pdf->Output();

            $pdf->Output($pdfFilePath, 'F');
        } else {
            // Manejo de error si la inserción falla
            echo "La inserción ha fallado";
        }
    }
}
