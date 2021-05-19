<?php
require_once './../../includes/conexion.php';
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id = (isset($_GET['id'])) ? $_GET['id'] : null ;
    $tabla = trim($_GET['tabla']);
    if( !$id ){
        $resultados = [];
        $sql = "SELECT * from $tabla";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_execute($query);
        $ok = mysqli_stmt_bind_result($query, $id, $nameTipo);
        while(mysqli_stmt_fetch($query)){
            array_push($resultados, ['id' => $id , 'nameTipo'=> $nameTipo]);
        }
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText'=> 'resultados encontrados',
            'data' => $resultados
        );
        echo json_encode($res);
        return ;
    }
    if ($tabla != 'dispositivo_electronico'){
        $resultados=[];
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
        $resultados = [];
            $sql = "SELECT serial,placa_sena,tipo_dispositivo.id_tipo_dispositivo, nom_tipo_dispositivo, nom_dispositivo,estado_disponibilidad.id_estado_disponibilidad,nom_estado_disponibilidad,estado_dispositivo.id_estado_dispositivo,nom_estado_dispositivo, marca.id_marca,nom_marca 
                    from dispositivo_electronico,estado_disponibilidad,estado_dispositivo,marca,tipo_dispositivo 
                    where serial = ?
                    AND dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo 
                    AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
                    AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
                    AND dispositivo_electronico.id_marca = marca.id_marca
                ";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $id);
        $ok = mysqli_stmt_execute($query);
        $ok = mysqli_stmt_bind_result($query, $serial , $placa_sena,$idTipoDispositivo, $nom_tipo_dispositivo,$nom_dispositivo ,
        $idEstadoDisponibilidad ,$nom_estado_disponibilidad , $idEstadoDispositivo,$nom_estado_dispositivo ,$idMarca, $nom_marca );
        while(mysqli_stmt_fetch($query)){
            array_push($resultados, [
                'serial' => $serial ,
                'placa_sena'=> $placa_sena,
                'idTipoDispositivo' => $idTipoDispositivo ,
                'nom_tipo_dispositivo'=> $nom_tipo_dispositivo,
                'nom_dispositivo'=> $nom_dispositivo,
                'idEstadoDisponibilidad' => $idEstadoDisponibilidad,
                'nom_estado_disponibilidad'=> $nom_estado_disponibilidad,
                'idEstadoDispositivo' => $idEstadoDispositivo,
                'nom_estado_dispositivo'=> $nom_estado_dispositivo,
                'idMarca' => $idMarca,
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
}elseif( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $_POST = json_decode( file_get_contents('php://input'), true);
    $tabla = $_POST['tabla'];
    function insertTable ( $mysqli, $tabla, $nametipo , $valueNameTipo ){
        $sql = "INSERT into $tabla (id_$tabla, $nametipo) values ( null , ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's' , $valueNameTipo);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = [];
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
            echo json_encode($res);
        }else{
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }
    }
    if( $tabla === 'tipo_dispositivo' ){
        insertTable($mysqli, $tabla, 'nom_tipo_dispositivo', $_POST['nameTipo']);
    }else if( $tabla === 'marca' ){
        insertTable($mysqli, $tabla, 'nom_marca', $_POST['nameTipo']);
    } else if( $tabla === 'estado_dispositivo'  ){
        insertTable($mysqli, $tabla , 'nom_estado_dispositivo', $_POST['nameTipo']);
    } else if( $tabla === 'estado_aprobacion' ){
        insertTable( $mysqli, $tabla, 'nom_aprobacion', $_POST['nameTipo']);
    } else if( $tabla === 'estado_disponibilidad' ){
        insertTable($mysqli , $tabla , 'nom_estado_disponibilidad', $_POST['nameTipo']);
    } else if ($tabla === 'nave'){
        insertTable($mysqli, $tabla , 'nom_nave', $_POST['nameTipo']);
    } else if ($tabla === 'jornada'){
        insertTable($mysqli, $tabla , 'nom_jornada', $_POST['nameTipo']);
    } else if ($tabla === 'formacion'){
        insertTable($mysqli, $tabla , 'nom_formacion', $_POST['nameTipo']);
    } else if ($tabla === 'detalle_formacion'){
        $sql = "INSERT INTO detalle_formacion (id_detalle_formacion, id_formacion, num_ficha, id_ambiente) VALUES (NULL, ?, ?, ? )";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iii', $_POST['formacion'],$_POST['num_ficha'], $_POST['ambiente'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = [];
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
            echo json_encode($res);
        }else{
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }
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
    if($_PUT['tabla'] == 'marca'){
        $sql = "UPDATE $tabla set nom_marca = ? where id_marca = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['marca'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'marca actualizada corractamente'
        );
        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'estado_dispositivo'){
        $sql = "UPDATE $tabla set nom_estado_dispositivo = ? where id_estado_dispositivo = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['estadoDispositivo'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'estado del dispositivo actualizado correctamente'
        );
        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'estado_aprobacion'){
        $sql = "UPDATE $tabla set nom_aprobacion = ? where id_estado_aprobacion = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['nameEstadoAprobacion'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'estado de aprobacion modificado correctamente'
        );
        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'estado_disponibilidad'){
        $sql = "UPDATE $tabla set nom_estado_disponibilidad = ? where id_estado_disponibilidad = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['nameEstadoDisponibilidad'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'estado de disponibilidad modificado correctamente'
        );
        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'dispositivo_electronico'){
        $sql = "UPDATE $tabla set serial =? , placa_sena =?, id_tipo_dispositivo =? , nom_dispositivo = ?,
        id_estado_disponibilidad = ?, id_estado_dispositivo = ?, id_marca = ? where serial = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iiisiiii',$_PUT['serial'], $_PUT['placaSena'], $_PUT['TipoDispo'], $_PUT['nameDispositivoElectronico'],
                                    $_PUT['EstadoDisponibilidad'], $_PUT['EstadoDispositivo'], $_PUT['marca'], $_PUT['serialAntiguo'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Dispositivo electronico actualizado con exito',
        );   

        echo json_encode($res);   
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $_DELETE = json_decode(file_get_contents('php://input'), true);
    $tabla = $_DELETE['tabla'];
    $id = $_DELETE['id'];
    if($tabla !== 'dispositivo_electronico'){
        $sql = "DELETE from $tabla where id_$tabla = ?";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 's' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Registro borrado con exito',
        );
        echo json_encode($res);
    }
    if($tabla === 'dispositivo_electronico' ){
        $sql = "DELETE from $tabla where serial = ? ";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 'i' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Registro borrado con exito',
        );
        echo json_encode($res);
    }
}