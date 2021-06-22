<?php
require_once './../../includes/conexion.php';
/********** ACCIONES 
 * este archivo se creo con la finalidad de centralizar la mayor logica posible en un solo archivo
 * este archivo funciona como un api de tipo REST que recibe peticiones de los 4 verbos http basico
 * el crud GET, PUT , POST , DELETE
 * el verbo http GET sirve para leer
 * el verbo http POST sirve para enviar
 * el verbo http PUT sirve para actualizar
 * el verbo http DELETE sirve para eliminar
 */
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] === 'GET'){ // aca hago la comprobacion si la peticion http vino por el metodo get
    $id = (isset($_GET['id'])) ? $_GET['id'] : null ; /** aca extraigo el parametro id */
    $tipDispo = (isset($_GET['tipDispo'])) ? $_GET['tipDispo'] : null;
    $tabla = trim($_GET['tabla']);
    if( !$id && !$tipDispo){
        $resultados = [];
        if($tabla !=  'ambiente'){
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
        }else{
            $sql = "SELECT * from ambiente";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $id, $nameAmbiente, $nave);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, ['id' => $id , 'nameAmbiente' => $nameAmbiente, 'nave' => $nave]);
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
    }

    if ($tabla != 'dispositivo_electronico' && $tabla != 'detalle_formacion' && $tabla != 'ambiente' && $tabla !== 'periferico' && $tabla != 'usuarios' ){
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
    else if ($tabla == 'dispositivo_electronico'){
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
        }else if ($tabla == 'detalle_formacion'){
            $resultados = [];
            $sql = "SELECT id_detalle_formacion,formacion.id_formacion,nom_formacion,num_ficha, ambiente.id_ambiente,ambiente.nom_ambiente 
                    FROM detalle_formacion,formacion,ambiente 
                    WHERE detalle_formacion.id_formacion = formacion.id_formacion
                    AND detalle_formacion.id_ambiente = ambiente.id_ambiente
                    AND id_detalle_formacion = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 's', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $id_detalle_formacion,$id_formacion, $nom_formacion, $num_ficha, $id_ambiente, $nom_ambiente);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, [
                    'id_detalle_formacion' => $id_detalle_formacion,
                    'id_formacion'=> $id_formacion,
                    'nom_formacion'=> $nom_formacion,
                    'num_ficha' => $num_ficha ,
                    'id_ambiente' => $id_ambiente,
                    'nom_ambiente'=> $nom_ambiente,
                    ]);
            }
            mysqli_stmt_close($query);
            $res = array(
            'status' => http_response_code(200),
            'statusText', 'resultados encontrados',
            'data' => $resultados, 
            );
            echo json_encode($res);
        }else if ($tabla == 'ambiente'){
            $resultados= [];
            $sql = "SELECT id_ambiente, nom_ambiente, ambiente.id_nave, nave.nom_nave from ambiente,nave where id_ambiente = ? AND ambiente.id_nave = nave.id_nave ";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $id, $nameAmbiente, $id_nave, $nave);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, ['id' => $id , 'nameAmbiente' => $nameAmbiente, 'id_nave' => $id_nave ,'nave' => $nave]);
            }
            mysqli_stmt_close($query);
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText'=> 'Resultados encontrados',
                'data' => $resultados
            );
            echo json_encode($res);
            return ;
        }else if($tabla == "periferico"){
            $resultados = [];
            if($tipDispo == 1) {
                $idDispositivos = [3];
                $sql = "SELECT * from periferico where id_tip_periferico = ?";
                $query = mysqli_prepare($mysqli, $sql);
                $ok = mysqli_stmt_bind_param($query , 'i', $idDispositivos[0]);
                $ok = mysqli_stmt_execute($query);
                $ok = mysqli_stmt_bind_result($query, $idPeriferico, $idTipPeriferico,$nomTipPeriferico,$idMarca,$fechaAdd, $idEstadoDisponibilidad, $idEstadoDispositivo );
                while(mysqli_stmt_fetch($query)){
                    array_push($resultados, 
                    [
                        'id' => $idPeriferico,
                        "idTipoPeriferico" => $idTipPeriferico,
                        'nomPeriferico' => $nomTipPeriferico,
                        'idMarca' => $idMarca,
                        'fechaAdd' => $fechaAdd,
                        'idEstadoDisponibilidad' => $idEstadoDisponibilidad,
                        "idEstadoDispositivo" => $idEstadoDispositivo,
                    ]
                    );
                }
            }
            $res;
            if(count($resultados) > 0){
                $res = array(
                    "err" => false,
                    "status" => http_response_code(200),
                    "statusText" => "datos encontrados con exito",
                    "data" => $resultados
                );
            }else{
                $res = array(
                    "err" => false,
                    "status" => http_response_code(200),
                    "statusText" => "no se encontraron datos",
                    "data" => [],
                );
            }
            echo json_encode($res);
        }else if($tabla == "usuarios"){
            $resultados = []; 
            $sql = "SELECT documento, tipo_documento.id_tipo_documento,tipo_documento.nom_documento,Cod_Carnet,Nombres,
                    Apellidos,fecha_nacimiento,correo_personal,correo_sena,telefono,genero.id_genero,genero.nom_genero
                    FROM usuarios,tipo_documento,tipo_usuario,genero
                    WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                    AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                    AND usuarios.id_genero = genero.id_genero
                    AND documento = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query , 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $documento,$id_tipo_documento, $select_documento, $cod_carnet, $nombres, $apellidos, $fecha_nacimiento, $correo_personal, $correo_sena, $telefono,$id_genero, $select_genero );
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, 
                [
                    'documento' => $documento,
                    'select_documento' => $select_documento,
                    'id_tipo_documento' => $id_tipo_documento,
                    'cod_carnet' => $cod_carnet,
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
                    'fecha_nacimiento' => $fecha_nacimiento,
                    'correo_personal' => $correo_personal,
                    'correo_sena' => $correo_sena,
                    'telefono' => $telefono,
                    'id_genero' => $id_genero,
                    'select_genero' => $select_genero,
                ]
                );
            }
            
            $res;
            if(count($resultados) > 0){
                $res = array(
                    "err" => false,
                    "status" => http_response_code(200),
                    "statusText" => "datos encontrados con exito",
                    "data" => $resultados
                );
            }else{
                $res = array(
                    "err" => false,
                    "status" => http_response_code(200),
                    "statusText" => "no se encontraron datos",
                    "data" => [],
                );
            }
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
    } else if ($tabla === 'ambiente'){
        $sql = "INSERT INTO ambiente (id_ambiente, id_nave , nom_ambiente) VALUES (?, ?, ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iis', $_POST['id_ambiente'],$_POST['nave'],$_POST['nom_ambiente']);
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
            echo json_encode($res);
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
    if($_PUT['tabla'] === 'nave'){
        $sql = "UPDATE $tabla set nom_nave =?  where id_nave = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ss',$_PUT['nom_nave'], $_PUT['id'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Nave Actualizada correctamente',
        );   

        echo json_encode($res);   
    }
    if($_PUT['tabla'] === 'jornada'){
        $sql = "UPDATE $tabla set nom_jornada =?  where id_jornada = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ss',$_PUT['nom_jornada'], $_PUT['id'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Jornada Actualizada correctamente',
        );   

        echo json_encode($res);   
    }
    if($_PUT['tabla'] === 'formacion'){
        $sql = "UPDATE $tabla set nom_formacion =?  where id_formacion = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ss',$_PUT['nom_formacion'], $_PUT['id'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Formacion Actualizada correctamente',
        );   

        echo json_encode($res);   
    }
    if($_PUT['tabla'] === 'detalle_formacion'){
        $sql = "UPDATE $tabla set  id_formacion= ? , num_ficha = ?, id_ambiente = ? 
                where id_detalle_formacion = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iiii', $_PUT['formacion'], $_PUT['numero_ficha'] , $_PUT['select_ambiente'], $_PUT['id_detalle_formacion']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array(
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Detalle Formacion Actualizada correctamente',
        );   

        echo json_encode($res);   
    } if ($_PUT['tabla'] === 'ambiente'){
        $sql = "UPDATE ambiente set  nom_ambiente= ? , id_nave = ? 
                where id_ambiente = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'sii', $_PUT['nom_ambiente'], $_PUT['select_nave'] , $_PUT['numero_ambiente']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Ambiente Actualizado correctamente',
            );   
    
            echo json_encode($_PUT);
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'Error',
            );   
    
            echo json_encode($_PUT);
        }
        
    }
    if($tabla === 'tipo_documento'){
        $sql = "UPDATE $tabla set nom_documento = ? where id_tipo_documento = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['tipDocu'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'tipo de documento modificado correctamente'
        );
        echo json_encode($res);
    }
    if($tabla === 'tipo_usuario'){
        $sql = "UPDATE $tabla set nom_tipo_usuario = ? where id_tipo_usuario = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['tipUsua'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'tipo de usuario modificado correctamente'
        );
        echo json_encode($res);
    }
    if($tabla === 'usuarios'){
        $sql = "UPDATE $tabla SET id_tipo_documento = ?, Cod_Carnet = ?, Nombres = ?, Apellidos = ?, fecha_nacimiento = ?, correo_personal = ?, correo_sena = ?, telefono = ?, id_genero = ? WHERE documento = ? ";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'iisssssiii' , $_PUT['select_tipo_docu'] , $_PUT['Cod_Carnet'], $_PUT['nombres'], $_PUT['apellidos'], $_PUT['fecha_nacimiendo'], $_PUT['correo_personal'], $_PUT['correo_sena'], $_PUT['telefono'], $_PUT['select_tipo_genero'], $_PUT['documento']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Usuario modificado correctamente'
        );
        echo json_encode($res);
    }


}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $_DELETE = json_decode(file_get_contents('php://input'), true);
    $tabla = $_DELETE['tabla'];
    $id = $_DELETE['id'];
    if($tabla !== 'dispositivo_electronico' && $tabla !== 'usuarios'){
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
    if($tabla === 'usuarios' ){
        $sql = "DELETE from $tabla where documento = ? ";
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