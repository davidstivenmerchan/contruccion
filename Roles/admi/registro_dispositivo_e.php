<?php

include '../../includes/conexion.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = json_decode( file_get_contents('php://input'), true );
    $serial = $_POST['serial'];
    $placa_sena = $_POST['placaSena'];
    $nom_dispositivo = $_POST['nomDispositivo'];
    $id_tipo_dis = $_POST['idTipoDis'];
    $estado_disponi = $_POST['estadoDisponi'];
    $estado_disposi = $_POST['estadoDisposi'];
    $marca = $_POST['marca'];
    
    $consulta = "INSERT INTO dispositivo_electronico(serial, placa_sena,id_tipo_dispositivo,
    nom_dispositivo,id_estado_disponibilidad,id_estado_dispositivo,id_marca) values($serial,'$placa_sena',
    $id_tipo_dis,'$nom_dispositivo',$estado_disponi,$estado_disposi,$marca)";

    $query =  mysqli_query($mysqli,$consulta);

    if($query){
        echo json_encode([
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'usuario creado con exito',
        ]);
        // echo json_encode(1);
    }else{
        echo json_encode([
            'err' => true,
            'status' => http_response_code(500),
            'statusText' => 'no se puede crear el usuario',
        ]);
        // echo json_encode(2);
    }


}

?>