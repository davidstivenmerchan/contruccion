<?php

    require_once ('../../../includes/conexion.php');

    $serial = $_POST['id'];

    $consulta1 = "SELECT dispositivo_electronico.procesador, dispositivo_electronico.ramGB, 
    tipo_sistema.nom_tipo_sistema, marca.nom_marca from dispositivo_electronico, tipo_sistema, 
    marca, tip_periferico, periferico, compu_peris WHERE 
    tipo_sistema.id_tipo_sistema=dispositivo_electronico.id_tipo_sistema AND 
    marca.id_marca=dispositivo_electronico.id_marca and 
    tip_periferico.id_tip_periferico=periferico.id_tip_periferico and dispositivo_electronico.serial=$serial";
    $ejecutar1 = mysqli_query($mysqli, $consulta1); 

    if(!$ejecutar1){
        die ('error');
    }
    $json = array();
    while($row = mysqli_fetch_array($ejecutar1)){
        $json[] = array(
            'procesador' => $row['procesador'],
            'ramGB' => $row['ramGB'],
            'nom_tipo_sistema' => $row['nom_tipo_sistema'],
            'nom_marca' => $row['nom_marca']

          
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>