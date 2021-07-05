<?php

    require_once ('../../../includes/conexion.php');

    $serial = $_POST['id'];
    $enuso = "En Uso";

    $consulta1 = "SELECT usuarios.documento, usuarios.Nombres, usuarios.Apellidos, usuarios.telefono, usuarios.correo_sena FROM
    equipos, entrada_aprendiz, usuarios, asignacion_equipos
    WHERE equipos.id_equipo=asignacion_equipos.id_equipo
    and entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz
    and usuarios.documento=entrada_aprendiz.documento
    and serial='$serial' and descripcion_final='$enuso'";
    $ejecutar1 = mysqli_query($mysqli, $consulta1); 

    if(!$ejecutar1){
        die ('error');
    }
    $json = array();
    while($row = mysqli_fetch_array($ejecutar1)){
        $json[] = array(
            'documento' => $row['documento'],
            'Nombres' => $row['Nombres'],
            'Apellidos' => $row['Apellidos'],
            'telefono' => $row['telefono'],
            'correo_sena' => $row['correo_sena']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>