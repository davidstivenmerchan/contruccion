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



$consulta = "SELECT entrada_aprendiz.documento, entrada_aprendiz.fecha, equipos.serial, 
asignacion_equipos.descripcion_inicial, asignacion_equipos.descripcion_final
FROM entrada_aprendiz, equipos, asignacion_equipos
WHERE entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz
and equipos.id_equipo=asignacion_equipos.id_equipo and entrada_aprendiz.fecha LIKE '$fecha%'";
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
    $this->Cell(100,10,'Informes de Asistencia',1,0,'C');
    // Salto de línea
    $this->Ln(30);

    $this->Cell(55,10,'Documento',1, 0,'C',0);
    $this->Cell(55,10,'Fecha',1, 0,'C',0);
    $this->Cell(55,10,'Serial',1, 0,'C',0);
    $this->Cell(55,10,'Descripcion Inicial',1, 0,'C',0);
    $this->Cell(55,10,'Descripcion Final',1, 1,'C',0);
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
    $pdf->Cell(55,20,$row['documento'],1, 0,'C',0);
    $pdf->Cell(55,20,$row['fecha'],1, 0,'C',0);
    $pdf->Cell(55,20,$row['serial'],1, 0,'C',0);
    $pdf->Cell(55,20,$row['descripcion_inicial'],1, 0,'C',0);
    $pdf->Cell(55,20,$row['descripcion_final'],1, 1,'L',0);

}
$pdf->Output();
?>