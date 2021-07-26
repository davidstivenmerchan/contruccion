<?php

    require_once ('../../../includes/conexion.php');

    $serial = $_POST['id'];

    $consulta1 = "SELECT procesadores.nom_procesador, dispositivo_electronico.ramGB, 
    tipo_sistema.nom_tipo_sistema, marca.nom_marca from dispositivo_electronico, tipo_sistema, 
    marca, procesadores WHERE 
    tipo_sistema.id_tipo_sistema=dispositivo_electronico.id_tipo_sistema AND 
    marca.id_marca=dispositivo_electronico.id_marca and
    procesadores.id_procesador=dispositivo_electronico.id_procesador and
    dispositivo_electronico.serial='$serial'";
    $ejecutar1 = mysqli_query($mysqli, $consulta1); 

    if(!$ejecutar1){
        die ('error');
    }
    $json = array();
    while($row = mysqli_fetch_array($ejecutar1)){
        $json[] = array(

            'procesador' => $row['nom_procesador'],
            'ramGB' => $row['ramGB'],
            'nom_tipo_sistema' => $row['nom_tipo_sistema'],
            'nom_marca' => $row['nom_marca']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>