<?php
require_once './../../includes/conexion.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!$_GET['query'] || !$_GET['id'] ) {
        echo json_encode([
            'err' => true,
            'status' => http_response_code(403),
            'statusText' => 'error en peticion agrege data correcta'
        ]);

        return;
    }
    $resultados = [];
    $id = intval($_GET['id']);
    function consultarUser( $mysqli, $id, $tipoUsuario, $resultados){
        $sql = "SELECT documento, nom_documento,nom_tipo_usuario,Cod_Carnet,Nombres,
        Apellidos,fecha_nacimiento,nom_genero,correo_personal,correo_sena,telefono
        FROM usuarios,tipo_documento,tipo_usuario,genero
        WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
        AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
        AND usuarios.id_genero = genero.id_genero
        AND usuarios.id_tipo_usuario = ?
        AND documento like '$id%'";
        $stmt = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($stmt, 'i', $tipoUsuario);
        $ok = mysqli_stmt_execute($stmt);
        $ok = mysqli_stmt_bind_result($stmt, $documento, $nomTipDocu, $nomTipoUsuario, $codCarnet, $nombres,
        $apellidos, $fechaNacimiento, $nomGenero, $correoPersonal, $correoSena, $telefono);
        while(mysqli_stmt_fetch($stmt)){
            array_push($resultados, [
                'documento' => $documento,
                'nomTipDocu' => $nomTipDocu,
                'nomTipUsuario' => $nomTipoUsuario,
                'codCarnet' =>$codCarnet,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'fechaNacimiento' => $fechaNacimiento,
                'nomGenero' => $nomGenero,
                'correoPersonal' => $correoPersonal,
                'correoSena' => $correoSena,
                'telefono' => $telefono
            ]);
        }
        mysqli_stmt_close($stmt);
        $res = '';
        if( $ok ){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'data Encontrada',
                'data' => $resultados
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'Ohhhhh ocurrio un error'
            );
        }
        return $res;
    }
    if($_GET['query'] === 'instructor'){
        $tipUsuario = 3;
        echo json_encode(consultarUser($mysqli, $id, $tipUsuario, $resultados));
        return;
    }elseif( $_GET['query'] === 'aprendiz'){
        $tipUsua = 2;
        echo json_encode(consultarUser($mysqli, $id, $tipUsua, $resultados));
    }else if($_GET['query'] === 'dispo_electronico'){
        $resultados = [];
        $sql = "SELECT serial,placa_sena, nom_tipo_dispositivo, nom_dispositivo,nom_estado_disponibilidad,nom_estado_dispositivo,nom_marca
        FROM dispositivo_electronico,estado_disponibilidad,estado_dispositivo,marca,tipo_dispositivo 
        WHERE dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo 
        AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
        AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
        AND dispositivo_electronico.id_marca = marca.id_marca
        AND dispositivo_electronico.serial like '$id%'";
        $stmt = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_execute($stmt);
        $ok = mysqli_stmt_bind_result($stmt,$serial, $placaSena, $nomTipoDispo, $nomDispositivo, $estadoDisponibilidad, $estadoDispositivo, $marca);
        while(mysqli_stmt_fetch($stmt)){
            array_push($resultados, [
                'serial' => $serial,
                'placaSena' => $placaSena,
                'nomTipoDispo' => $nomTipoDispo,
                'nomDispositivo' => $nomDispositivo,
                'estadoDisponibilidad' => $estadoDisponibilidad,
                'estadoDispositivo' => $estadoDispositivo,
                'marca' => $marca
            ]);
        }

        mysqli_stmt_close($stmt);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'datos encontrados',
                'data' => $resultados
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'error al realizar la consulta'
            );
        }

        echo json_encode($res);
    }
}