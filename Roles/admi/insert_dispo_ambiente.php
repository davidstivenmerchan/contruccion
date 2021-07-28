<?php

include('../../includes/conexion.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = json_decode(file_get_contents('php://input'),true);
    $tabla = $_POST['tabla'];
    if($tabla === 'disposi_ambientes'){  
        $sql = "INSERT INTO disposi_ambientes (id_disposi_ambientes , id_compu_peris , id_ambiente) values (null, ? , ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ii', $_POST['IdCompuPeris'], $_POST['IdAmbiente']);
        $ok = mysqli_stmt_execute($query);
        $res ;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Dispositivo Ambientes creado con exito'
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'Hubo  un error',
            );
        }
        
        
    }
    echo json_encode($_POST);
}
?>






