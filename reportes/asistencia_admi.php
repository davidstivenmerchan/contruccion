<?php
require('fpdf.php');

require 'proceso_asistencia.php';


$ficha = $_POST['fichas'];


$consulta = "SELECT entrada_aprendiz.documento, entrada_aprendiz.fecha, entrada_aprendiz.hora, 
entrada_aprendiz.hora_salida,fichas.ficha,fichas.instructor from entrada_aprendiz, usuarios, fichas, matricula 
where usuarios.documento=entrada_aprendiz.documento
and usuarios.documento=matricula.aprendiz
and fichas.ficha=matricula.ficha
and fichas.ficha='$ficha'";
$ejecucion= $mysqli->query($consulta);


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../assets/logo_sin_fondo_6.png',10,8,22);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    
    // Movernos a la derecha
    $this->Cell(90);
    // Título
    $this->Cell(100,10,'Informes de Asistencia General',1,0,'C');
    // Salto de línea
    $this->Ln(30);

    $this->Cell(47,10,'Documento',1, 0,'C',0);
    $this->Cell(47,10,'Fecha',1, 0,'C',0);
    $this->Cell(47,10,'Hora Entrada',1, 0,'C',0);
    $this->Cell(47,10,'Hora Salida',1, 0,'C',0);
    $this->Cell(47,10,'Ficha',1, 0,'C',0);
    $this->Cell(47,10,'Instructor',1, 1,'C',0);
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
    $pdf->Cell(47,10,$row['documento'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['fecha'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['hora'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['hora_salida'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['ficha'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['instructor'],1, 1,'C',0);

}
$pdf->Output();
?>