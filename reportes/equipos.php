<?php
require('fpdf.php');

require 'proceso_asistencia.php';

$consulta = "SELECT dispositivo_electronico.serial, dispositivo_electronico.placa_sena, tipo_dispositivo.nom_tipo_dispositivo, dispositivo_electronico.procesador, dispositivo_electronico.ramGB, tipo_sistema.nom_tipo_sistema,marca.nom_marca, dispositivo_electronico.almacenamiento, estado_dispositivo.nom_estado_dispositivo 
from dispositivo_electronico, tipo_dispositivo, tipo_sistema, marca, estado_dispositivo 
where tipo_dispositivo.id_tipo_dispositivo=dispositivo_electronico.id_tipo_dispositivo
and marca.id_marca=dispositivo_electronico.id_marca
and estado_dispositivo.id_estado_dispositivo=dispositivo_electronico.id_estado_dispositivo
and tipo_sistema.id_tipo_sistema=dispositivo_electronico.id_tipo_sistema";
$ejecucion= $mysqli->query($consulta);


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../assets/logo_sin_fondo_6.png',10,8,22);
    // Arial bold 15
    $this->SetFont('Arial','B',12);

    // Movernos a la derecha
    $this->Cell(90);
    // Título
    $this->Cell(100,10,'Informes de los Equipos',1,0,'C');
    // Salto de línea

    $this->Ln(30);

    $this->Cell(28,10,'Serial',1, 0,'C',0);
    $this->Cell(28,10,'Placa',1, 0,'C',0);
    $this->Cell(28,10,'Tipo',1, 0,'C',0);
    $this->Cell(28,10,'Procesador',1, 0,'C',0);
    $this->Cell(28,10,'Ram',1, 0,'C',0);
    $this->Cell(40,10,'Sistema',1, 0,'C',0);
    $this->Cell(28,10,'Marca',1, 0,'C',0);
    $this->Cell(40,10,'Almacenamiento',1, 0,'C',0);
    $this->Cell(28,10,'Estado',1, 1,'C',0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina'.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


while($row = $ejecucion->fetch_assoc()){
    $pdf->Cell(28,20,$row['serial'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['placa_sena'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['nom_tipo_dispositivo'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['procesador'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['ramGB'],1, 0,'C',0);
    $pdf->Cell(40,20,$row['nom_tipo_sistema'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['nom_marca'],1, 0,'C',0);
    $pdf->Cell(40,20,$row['almacenamiento'],1, 0,'C',0);
    $pdf->Cell(28,20,$row['nom_estado_dispositivo'],1, 1,'C',0);

}
$pdf->Output();
?>