<?php

    require_once ('../../../includes/conexion.php');

    $consulta1 = "SELECT entrada_aprendiz.documento, equipos.serial, 
    entrada_aprendiz.fecha, asignacion_equipos.hora_inicial, 
    asignacion_equipos.descripcion_inicial, asignacion_equipos.hora_final,
    asignacion_equipos.descripcion_final FROM asignacion_equipos, entrada_aprendiz, equipos 
    where entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz and
    equipos.id_equipo=asignacion_equipos.id_equipo";
    $ejecutar1 = mysqli_query($mysqli, $consulta1);

    if(!$ejecutar1){
        die ('error');
    }
    $json = array();
    while($row = mysqli_fetch_array($ejecutar1)){
        $json[] = array(
            'documento' => $row['documento'],
            'serial' => $row['serial'],
            'fecha' => $row['fecha'],
            'hora_inicial' => $row['hora_inicial'],
            'descripcion_inicial' => $row['descripcion_inicial'],
            'hora_final' => $row['hora_final'],
            'descripcion_final' => $row['descripcion_final']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;


?>