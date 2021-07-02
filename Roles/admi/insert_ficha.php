<?php
include('../../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_POST = json_decode(file_get_contents('php://input'),true);

    $numero_ficha = $_POST['numero_ficha'];
    $tip_jornada = $_POST['tip_jornada'];
    $tip_ambiente = $_POST['tip_ambiente'];
    $nom_formacion = $_POST['nom_formacion'];
    $doc_instruc = $_POST['doc_instruc'];

    $sql = "INSERT INTO fichas (ficha, id_jornada, id_ambiente, id_formacion, instructor) VALUES ('$numero_ficha', '$tip_jornada', '$tip_ambiente', '$nom_formacion', '$doc_instruc')";
    $query= mysqli_query($mysqli,$sql);

    $resp;
    if($query){
        $resp = array( 
            'err'=> false,
            'status'=> http_response_code(200),
            'statusText' => 'Ficha registrada con exito'
        );
    }else{
        $resp = array( 
            'err'=> false,
            'status'=> http_response_code(500),
            'statusText' => 'No se pudo agregar con exito'
        );
    }
    echo json_encode($resp); 
}
?>