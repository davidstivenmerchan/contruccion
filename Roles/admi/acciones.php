<?php
require_once './../../includes/conexion.php';
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $resultados = [];

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