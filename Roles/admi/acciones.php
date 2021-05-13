<?php
require_once './../../includes/conexion.php';
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $resultados = [];
    if ($tabla != 'dispositivo_electronico'){

        $sql = "SELECT * from $tabla where id_$tabla= ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $id);
        $ok = mysqli_stmt_execute($query);
        $ok = mysqli_stmt_bind_result($query, $id, $nameTipo);
        while(mysqli_stmt_fetch($query)){
            array_push($resultados, ['id' => $id , 'nameTipo'=> $nameTipo]);
        }
        mysqli_stmt_close($query);
        $res = array(
            'status' => http_response_code(200),
            'statusText', 'resultados encontrados',
            'data' => $resultados,
        );
        echo json_encode($res);
    }
    else{

        $sql = "SELECT serial,placa_sena, nom_tipo_dispositivo, nom_dispositivo,nom_estado_disponibilidad,nom_estado_dispositivo,nom_marca 
                from $tabla,estado_disponibilidad,estado_dispositivo,marca,tipo_dispositivo 
                where serial = ? 
                AND dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo 
                AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
                AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
                AND dispositivo_electronico.id_marca = marca.id_marca
                ";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $id);
        $ok = mysqli_stmt_execute($query);
        $ok = mysqli_stmt_bind_result($query, $serial , $placa_sena, $nom_tipo_dispositivo,$nom_dispositivo ,$nom_estado_disponibilidad ,$nom_estado_dispositivo ,$nom_marca );
        while(mysqli_stmt_fetch($query)){
            array_push($resultados, [
                'serial' => $serial ,
                'placa_sena'=> $placa_sena,
                'nom_tipo_dispositivo'=> $nom_tipo_dispositivo,
                'nom_dispositivo'=> $nom_dispositivo,
                'nom_estado_disponibilidad'=> $nom_estado_disponibilidad,
                'nom_estado_dispositivo'=> $nom_estado_dispositivo,
                'nom_marca'=> $nom_marca,
                ]);
        }
        mysqli_stmt_close($query);
        $res = array(
            'status' => http_response_code(200),
            'statusText', 'resultados encontrados',
            'data' => $resultados,
        );
        echo json_encode($res);
        }
}elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $_PUT = json_decode(file_get_contents('php://input'), true);
    $tabla = $_PUT['tabla'];
    if($_PUT['tabla'] ===  'tipo_dispositivo'){
        $sql = "UPDATE $tabla set nom_tipo_dispositivo = ? where id_tipo_dispositivo = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['nameTipoDispo'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'tipo de dispositivo actualizado correactamente'
        );
        echo json_encode($res);
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){

}