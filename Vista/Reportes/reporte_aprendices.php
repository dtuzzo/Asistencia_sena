<?php
require('FPDF/fpdf.php');
$ficha = $_POST['ficha'];

class PDF extends FPDF
{

function Header()
{   
    $mes = date("n");
    if ($mes >= 10){
        $fecha = date("d/n/Y");
    }else {
        $fecha = date("d/0n/Y");
    }
    $this->Image('../../assets/img/LogoSena.png', 8, 5, 25, 25, 'png');
    $this->SetFont('Helvetica','',10);
    $this->SetTextColor(66, 73, 73);
    $this->Cell(25);
    $this->Cell(30, 10, utf8_decode('Centro de Gestión de Mercados,'));
    $this->Cell(80);
    $this->SetFont('Helvetica','i',15);
    $this->Cell(30, 10, 'Fecha: '.$fecha);
    $this->Ln(5);
    $this->Cell(25);
    $this->SetFont('Helvetica','',10);
    $this->Cell(30, 10, utf8_decode('Logística y Tecnologías de la Información'));
    $this->SetY(35);
    $this->Cell(35);
    $this->SetFont('Helvetica','B',30);
    $this->SetTextColor(0, 0, 0);
    $this->Cell(50);
    $this->Cell(30,10,'Reporte Aprendices',0,0,'C');
    $this->Ln(20);
    $this->SetFont('Helvetica', 'B', 8);
    $this->SetFillColor(2, 123, 118);
    $this->SetDrawColor(2, 123, 118);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(8, 12, 'Tipo', 1, 0, 'C', 1);
    $this->Cell(20, 12, utf8_decode('Documento'), 1, 0, 'C', 1);
    $this->Cell(22, 12, 'Nombre', 1, 0, 'C', 1);
    $this->Cell(22, 12, 'Apellido', 1, 0, 'C', 1);
    $this->Cell(20, 12, 'Celular', 1, 0, 'C', 1);
    $this->Cell(35, 12, 'Correo P.', 1, 0, 'C', 1);
    $this->Cell(35, 12, 'Correo MiSena', 1, 0, 'C', 1);
    $this->Cell(12, 12, 'Estado', 1, 0, 'C', 1);
    $this->Cell(16, 12, 'Ficha', 1, 1, 'C', 1);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Helvetica','I',10);
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexionR.php';

$consulta = "select * from VISTA_APRENDIZ2 where id_ficha_fk = ".$ficha.";";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',8);
 
while ($row = $resultado-> fetch_assoc()){
    $pdf->SetDrawColor(2, 123, 118);
    $pdf->Cell(8, 10, utf8_decode($row['tipodocumento_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['numerodocumento_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(22, 10, utf8_decode($row['nombre_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(22, 10, utf8_decode($row['apellido_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['celular_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($row['correosena_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(35, 10, utf8_decode($row['correopersonal_aprendiz']), 1, 0, 'C', 0);
    $pdf->Cell(12, 10, utf8_decode($row['nombre_estado']), 1, 0, 'C', 0);
    $pdf->Cell(16, 10, utf8_decode($row['numero_ficha']), 1, 1, 'C', 0);
}

$pdf->Output();
?>