<?php
require('FPDF/fpdf.php');
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
    $this->Image('../../../assets/img/LogoSena.png', 8, 5, 25, 25, 'png');
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
    $this->Cell(30,10,'Reporte Funcionario',0,0,'C');
    $this->Ln(20);
    $this->SetFont('Helvetica', 'B', 8);
    $this->SetFillColor(2, 123, 118);
    $this->SetDrawColor(2, 123, 118);
    $this->SetTextColor(255, 255, 255);
    $this->Cell(10, 12, 'Id.', 1, 0, 'C', 1);
    $this->Cell(30, 12, utf8_decode('Documento'), 1, 0, 'C', 1);
    $this->Cell(34, 12, 'Nombre', 1, 0, 'C', 1);
    $this->Cell(34, 12, 'Apellido', 1, 0, 'C', 1);
    $this->Cell(20, 12, 'Celular', 1, 0, 'C', 1);
    $this->Cell(22, 12, utf8_decode('Contraseña'), 1, 0, 'C', 1);
    $this->Cell(20, 12, 'Rol', 1, 0, 'C', 1);
    $this->Cell(20, 12, 'Materia', 1, 1, 'C', 1);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Helvetica','I',10);
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexionR.php';
$consulta = "select * from funcionario;";
$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',8);

while ($row = $resultado-> fetch_assoc()){
    $pdf->SetDrawColor(2, 123, 118);
    $pdf->Cell(10, 10, $row['id_funcionario'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, utf8_decode($row['numerodocumento_funcionario']), 1, 0, 'C', 0);
    $pdf->Cell(34, 10, utf8_decode($row['nombre_funcionario']), 1, 0, 'C', 0);
    $pdf->Cell(34, 10, utf8_decode($row['apellido_funcionario']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['celular_funcionario']), 1, 0, 'C', 0);
    $pdf->Cell(22, 10, utf8_decode($row['clave_funcionario']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['id_rol_fk']), 1, 0, 'C', 0);
    $pdf->Cell(20, 10, utf8_decode($row['id_materia_fk']), 1, 1, 'C', 0);
}

$pdf->Output();
?>