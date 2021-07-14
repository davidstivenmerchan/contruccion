<?php
require('fpdf.php');

require 'proceso_asistencia.php';

$consulta = "SELECT entrada_aprendiz.documento, entrada_aprendiz.fecha, dispositivo_electronico.serial, dispositivo_electronico.placa_sena, tipo_dispositivo.nom_tipo_dispositivo, estado_dispositivo.nom_estado_dispositivo, asignacion_equipos.descripcion_inicial, asignacion_equipos.descripcion_final 
from entrada_aprendiz, dispositivo_electronico, tipo_dispositivo, estado_dispositivo, asignacion_equipos, equipos 
WHERE entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz
and tipo_dispositivo.id_tipo_dispositivo=dispositivo_electronico.id_tipo_dispositivo
and estado_dispositivo.id_estado_dispositivo=dispositivo_electronico.id_estado_dispositivo
and dispositivo_electronico.serial=equipos.serial
and equipos.id_equipo=asignacion_equipos.id_equipo";
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
    $this->Cell(100,10,'Informes de Equipos General',1,0,'C');
    // Salto de línea
    $this->Ln(30);

    $this->Cell(35,10,'Documento',1, 0,'C',0);
    $this->Cell(35,10,'Fecha',1, 0,'C',0);
    $this->Cell(35,10,'Serial',1, 0,'C',0);
    $this->Cell(35,10,'Dispositivo',1, 0,'C',0);
    $this->Cell(35,10,'Estado',1, 0,'C',0);
    $this->Cell(50,10,'Estado Inicial',1, 0,'C',0);
    $this->Cell(50,10,'Estado Final',1, 1,'C',0);
    
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
    $pdf->Cell(35,10,$row['documento'],1, 0,'C',0);
    $pdf->Cell(35,10,$row['fecha'],1, 0,'C',0);
    $pdf->Cell(35,10,$row['serial'],1, 0,'C',0);
    $pdf->Cell(35,10,$row['nom_tipo_dispositivo'],1, 0,'C',0);
    $pdf->Cell(35,10,$row['nom_estado_dispositivo'],1, 0,'C',0);
    $pdf->Cell(50,10,$row['descripcion_inicial'],1, 0,'C',0);
    $pdf->Cell(50,10,$row['descripcion_final'],1, 1,'C',0);
    

}
$pdf->Output();
?>