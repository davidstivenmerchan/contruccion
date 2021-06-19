<?php
    include('../../includes/conexion.php');

    $consulta1 = "SELECT entrada_aprendiz.documento, asignacion_equipos.id_equipo, equipos.serial 
    FROM entrada_aprendiz, asignacion_equipos, equipos  
    WHERE entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz 
    AND equipos.id_equipo=asignacion_equipos.id_equipo 
    AND documento = 7070"
?>

