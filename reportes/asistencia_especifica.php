<?php
require('fpdf.php');

require 'proceso_asistencia.php';

//$dia = date('d');
//$mes =date('m');
//$año =date('Y');

$mes = $_POST['mes'];
$año = $_POST['año'];

$fecha = "$año-$mes";



/* $consulta2= "SELECT fecha FROM entrada_aprendiz";
$ejecucion2= mysqli_query($mysqli, $consulta2);
$mos = mysqli_fetch_array($ejecucion2);
if($mos){
    $fechabd = $mos['fecha'];
}

 */             //     entrada_aprendiz.documento LIKE '$buscar%'"



$consulta = "SELECT fecha, documento, hora, hora_salida FROM entrada_aprendiz where fecha LIKE '$fecha%'";
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
    $this->Cell(50);
    // Título
    $this->Cell(100,10,'Informes de Asistencia',1,0,'C');
    // Salto de línea
    $this->Ln(30);

    $this->Cell(47,10,'Documento',1, 0,'C',0);
    $this->Cell(47,10,'Fecha',1, 0,'C',0);
    $this->Cell(47,10,'Hora Entrada',1, 0,'C',0);
    $this->Cell(47,10,'Hora Salida',1, 1,'C',0);
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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


while($row = $ejecucion->fetch_assoc()){
    $pdf->Cell(47,10,$row['documento'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['fecha'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['hora'],1, 0,'C',0);
    $pdf->Cell(47,10,$row['hora_salida'],1, 1,'C',0);

}
$pdf->Output();
?>