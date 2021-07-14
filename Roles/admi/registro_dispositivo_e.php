<?php

include '../../includes/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = json_decode( file_get_contents('php://input'), true );
    $serial = $_POST['serial'];
    $placa_sena = $_POST['placaSena'];
    $id_tipo_dis =  $_POST['id_tipo_dis'];
    $Procesador = $_POST['Procesador'];
    $RamGB = $_POST['RamGB'];
    $id_tipo_siste = $_POST['id_tipo_siste'];
    $estado_disponi = $_POST['estadoDisponi'];
    $estado_disposi = $_POST['estado_disposi'];    
    $marca = $_POST['marca'];
    $Almacenamiento = $_POST['Almacenamiento'];
    $ambiente_dispo = $_POST['ambiente_dispo'];
    
    $consulta = "INSERT INTO dispositivo_electronico(serial, placa_sena,id_tipo_dispositivo,
    procesador,ramGB,id_tipo_sistema,id_estado_disponibilidad,id_estado_dispositivo,id_marca,almacenamiento,id_ambiente) 
    values($serial,'$placa_sena', $id_tipo_dis,'$Procesador','$RamGB','$id_tipo_siste',$estado_disponi,$estado_disposi,$marca,'$Almacenamiento','$ambiente_dispo')";

    $query =  mysqli_query($mysqli,$consulta);

    if($query){
        echo json_encode([
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Dispositivo creado con exito',
        ]);
        // echo json_encode(1);
    }else{
        echo json_encode([
            'err' => true,
            'status' => http_response_code(500),
            'statusText' => 'No se puede crear el Dispositivo',
        ]);
        // echo json_encode(2);
    }


}

?>