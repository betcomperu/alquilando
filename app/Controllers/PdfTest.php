<?php 
namespace App\Controllers;
use App\ThirdParty\fpdf\FPDF;

class PdfTest extends BaseController
{
    public function testGeneratePdf()
    {
        // Datos de prueba (puedes reemplazarlos con datos reales)
        $nombreCliente = 'Juan Pérez';
        $montoPago = 100.50;

        // Crear un nuevo objeto FPDF
        $pdf = new \FPDF();

        // Añadir una página
        $pdf->AddPage();

        // Establecer la fuente y el tamaño del texto
        $pdf->SetFont('Arial', 'B', 16);

        // Agregar contenido de prueba al PDF
        $pdf->Cell(0, 10, 'Recibo de Pago de Prueba', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Cliente: ' . $nombreCliente, 0, 1);
        $pdf->Cell(0, 10, 'Monto: $' . $montoPago, 0, 1);

     
        // Generar el PDF y mostrarlo en el navegador
        $pdf->Output('recibo_prueba.pdf', 'I');
    }
}
