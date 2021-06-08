<?php

include('../../includes/conexion.php');
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = json_decode( file_get_contents('php://input'), true );
    $tabla = $_POST['tabla'];
    if( $tabla === 'usuarios' ){
        $cc = $_POST['doc'];
        $tipdoc= $_POST['tipDoc'];
        $tipusu= $_POST['tipUsua'];
        $cod= $_POST['codigo'];
        $nombre= $_POST['nom'];
        $ape= $_POST['ape'];
        $fecha= $_POST['fecha'];
        $genero= $_POST['genero'];
        $emailp= $_POST['emailPer'];
        $emails= $_POST['emailSena'];
        $clave= $_POST['clave'];
        $img= $_POST['imagen'];
    

        $consul = "INSERT INTO usuarios(documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,fecha_nacimiento,genero,correo_personal,correo_sena,password,foto) 
        values ($cc,$tipdoc,$tipusu,$cod,'$nombre','$ape','$fecha','$genero','$emailp','$emails','$clave','$img')";

        $resultados = mysqli_query($mysqli,$consul);
    

        if($resultados){
            echo json_encode([
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'usuario insertado con exito',
            ]);
        }else{
            echo json_encode([
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede crear el usuario',
            ]);
        }
    }elseif( $tabla == 'tipo_documento' ){
        $nomdoc= $_POST['nom_doc'];
        $consul2 = "INSERT INTO tipo_documento (nom_documento) values ('$nomdoc')";

        $resultados2 = mysqli_query($mysqli,$consul2);
        

        if($resultados2){
            echo json_encode([
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'tipo de documento insertado con exito',
            ]);
        }else {
            echo json_encode([
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede crear el tipo de documento',
            ]);
        }
    }else if( $tabla === 'tipo_usuario' ){
        $nomusu= $_POST['nom_usu'];
        $consul3 = "INSERT INTO tipo_usuario (nom_tipo_usuario) values ('$nomusu')";

        $resultados3 = mysqli_query($mysqli,$consul3);
        

        if($resultados3){
            echo json_encode([
                'err' => false,
                'status' => http_response_code(),
                'statusText' => 'tipo de usuario creado con exito',
            ]);
        }else {
            echo json_encode([
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se pudo crear el tipo de usuario'
            ]);
        }
    }

    
}

