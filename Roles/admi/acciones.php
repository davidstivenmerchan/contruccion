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
    if( !$id && !$tipDispo && $tabla != 'instructores'){
        $resultados = [];
        if($tabla !=  'ambiente' && $tabla != 'instructores'){
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

    if ($tabla != 'dispositivo_electronico' && $tabla != 'detalle_formacion' && $tabla != 'ambiente' && $tabla !== 'periferico' && $tabla != 'usuarios' && $tabla != 'fichas' && $tabla != 'instructores' && $tabla !== 'compu_peris' && $tabla !== 'ram' && $tabla !== 'tipo_sistema' && $tabla !== 'almacenamiento' && $tabla !== 'procesadores' && $tabla !== 'disposi_ambientes' ){
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
    elseif ($tabla == 'dispositivo_electronico'){
        $resultados = [];
            $sql = "SELECT serial,placa_sena,tipo_dispositivo.id_tipo_dispositivo,tipo_dispositivo.nom_tipo_dispositivo,dispositivo_electronico.id_procesador, procesadores.nom_procesador,dispositivo_electronico.ramGB, ram.tamano_ram,tipo_sistema.id_tipo_sistema,tipo_sistema.nom_tipo_sistema,
            estado_disponibilidad.id_estado_disponibilidad,estado_disponibilidad.nom_estado_disponibilidad,estado_dispositivo.id_estado_dispositivo,estado_dispositivo.nom_estado_dispositivo,marca.id_marca,marca.nom_marca,dispositivo_electronico.id_almacena, almacenamiento.tamano_almacena
            FROM dispositivo_electronico,tipo_dispositivo,tipo_sistema,estado_disponibilidad,estado_dispositivo,marca,ambiente,procesadores, ram, almacenamiento
            WHERE dispositivo_electronico.id_tipo_dispositivo = tipo_dispositivo.id_tipo_dispositivo
            AND dispositivo_electronico.id_tipo_sistema = tipo_sistema.id_tipo_sistema
            AND dispositivo_electronico.id_estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad
            AND dispositivo_electronico.id_estado_dispositivo = estado_dispositivo.id_estado_dispositivo
            AND dispositivo_electronico.id_marca = marca.id_marca
            AND dispositivo_electronico.id_procesador = procesadores.id_procesador
            AND dispositivo_electronico.serial = ? LIMIT 1";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $id);
        $ok = mysqli_stmt_execute($query);
        $ok = mysqli_stmt_bind_result($query, $serial, $placa_sena, $idTipoDispositivo, $nom_tipo_dispositivo,$procesador, $nomProcesador,$ramGB, $nameRam, $idTipoSistema, $NomTipoSistema,
        $idEstadoDisponibilidad ,$nom_estado_disponibilidad , $idEstadoDispositivo,$nom_estado_dispositivo ,$idMarca, $nom_marca, $almacenamiento, $nameAlmacenamiento);
        while(mysqli_stmt_fetch($query)){
            array_push($resultados, [
                'serial' => $serial ,
                'placa_sena'=> $placa_sena,
                'idTipoDispositivo' => $idTipoDispositivo ,
                'nom_tipo_dispositivo'=> $nom_tipo_dispositivo,
                'procesador'=> $procesador,
                'nomProcesador' => $nomProcesador,
                'ramGB'=> $ramGB,
                'nameRam' => $nameRam,
                'idTipoSistema'=> $idTipoSistema,
                'NomTipoSistema'=> $NomTipoSistema,
                'idEstadoDisponibilidad' => $idEstadoDisponibilidad,
                'nom_estado_disponibilidad'=> $nom_estado_disponibilidad,
                'idEstadoDispositivo' => $idEstadoDispositivo,
                'nom_estado_dispositivo'=> $nom_estado_dispositivo,
                'idMarca' => $idMarca,
                'nom_marca'=> $nom_marca,
                'almacenamiento'=> $almacenamiento,
                'nomAlmacena' => $nameAlmacenamiento
                ]);
        }
        mysqli_stmt_close($query);
        $res = array(
            'status' => http_response_code(200),
            'statusText', 'resultados encontrados',
            'data' => $resultados,
        );
        echo json_encode($res);
        }elseif ($tabla == 'detalle_formacion'){
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
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText', 'resultados encontrados',
                    'data' => $resultados, 
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText', 'hubo un error al hacer la peticion',
                );
            }
            echo json_encode($res);
        }elseif ($tabla == 'ambiente'){
            $resultados= [];
            $sql = "SELECT id_ambiente, n_ambiente, ambiente.id_nave, nave.nom_nave from ambiente,nave where id_ambiente = ? AND ambiente.id_nave = nave.id_nave ";
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
        }elseif($tabla == 'periferico'){
            $resultados = [];
            $sql = "SELECT periferico.id_periferico,periferico.id_tip_periferico,tip_periferico.nom_tip_periferico, 
            periferico.id_marca,marca.nom_marca, periferico.estado_disponibilidad, estado_disponibilidad.nom_estado_disponibilidad,
            periferico.estado_dispositivo,estado_dispositivo.nom_estado_dispositivo, pulgadas, descripcion
            from periferico INNER JOIN tip_periferico on periferico.id_tip_periferico = tip_periferico.id_tip_periferico 
            INNER JOIN marca on periferico.id_marca = marca.id_marca 
            INNER JOIN estado_disponibilidad on periferico.estado_disponibilidad = estado_disponibilidad.id_estado_disponibilidad 
            INNER JOIN estado_dispositivo on periferico.estado_dispositivo = estado_dispositivo.id_estado_dispositivo 
            WHERE periferico.id_periferico = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query , 's', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idPeriferico, $idTipPeriferico,$nomTipPeriferico,$idMarca, $nomMarca,$idEstadoDisponibilidad,$nomEstadoDisponibilidad,
                $idEstadoDispositivo, $nomEstadoDispositivo, $pulgadas, $descripcion );
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, 
                [
                    'id' => $idPeriferico,
                    "idTipoPeriferico" => $idTipPeriferico,
                    'nomPeriferico' => $nomTipPeriferico,
                    'idMarca' => $idMarca,
                    'nomMarca' => $nomMarca,
                    'idEstadoDisponibilidad' => $idEstadoDisponibilidad,
                    'nomEstadoDisponibilidad' => $nomEstadoDisponibilidad,
                    "idEstadoDispositivo" => $idEstadoDispositivo,
                    'nomEstadoDispositivo' => $nomEstadoDispositivo,
                    'pulgadas' => $pulgadas,
                    'descripcion' => $descripcion
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
                    "statusText" => "no se encontraron datos!() ",
                    "data" => [],
                );
            }
            echo json_encode($res);
        }elseif($tabla == "usuarios"){
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
        }elseif($tabla == "fichas"){
            $resultados = []; 
            $sql = "SELECT ficha,jornada.id_jornada,jornada.nom_jornada,ambiente.id_ambiente,ambiente.n_ambiente,nave.id_nave,nave.nom_nave,formacion.id_formacion,formacion.nom_formacion,usuarios.documento,nombres,apellidos 
                    FROM fichas,usuarios,jornada,ambiente,nave,formacion 
                    WHERE fichas.id_jornada = jornada.id_jornada
                    AND fichas.id_ambiente = ambiente.id_ambiente
                    AND fichas.id_formacion = formacion.id_formacion
                    AND fichas.instructor = usuarios.documento
                    AND ambiente.id_nave = nave.id_nave
                    AND ficha = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query , 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $ficha, $id_jornada, $nom_jornada, $id_ambiente, $n_ambiente, $id_nave, $nom_nave, $id_formacion, $nom_formacion, $documento, $nombres, $apellidos);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, 
                [
                    'ficha' => $ficha,
                    'id_jornada' => $id_jornada,
                    'nom_jornada' => $nom_jornada,
                    'id_ambiente' => $id_ambiente,
                    'n_ambiente' => $n_ambiente,
                    'id_nave' => $id_nave,
                    'nom_nave' => $nom_nave,
                    'id_formacion' => $id_formacion,
                    'nom_formacion' => $nom_formacion,
                    'documento' => $documento,
                    'nombres' => $nombres,
                    'apellidos' => $apellidos,
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
        }elseif($tabla == "instructores"){
            $resultados = [];
            $id = 3;
            $sql = "SELECT documento,Nombres FROM usuarios WHERE id_tipo_usuario = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query , 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $documento, $nombres);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, 
                [
                    'documento' => $documento,
                    'nombres' => $nombres,
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
        }elseif($tabla ==='compu_peris'){
            $resultados = [];
            $sql = "SELECT * from compu_peris where id_compu_peris = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idCompuPeris, $serial, $idPeriferico, $fechaCompuPeris);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados,
                    [
                        'idCompuPeris' => $idCompuPeris,
                        'serial' => $serial,
                        'idPeriferico' => $idPeriferico,
                        'fechaCompuPeris' => $fechaCompuPeris,
                    ]
                );
            }

            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'data encontrada con exito',
                    'data' => $resultados,
                );
            }else {
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'no se hizo la peticion correctamente',
                    'data' => [],
                );
            }

            echo json_encode($res);

        }elseif($tabla ==='almacenamiento'){
            $resultados = [];
            $sql = "SELECT * from almacenamiento where id_almacena = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idAlmacena, $tamaAlmacena);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados,
                    [
                        'idAlmacena' => $idAlmacena,
                        'tamaAlmacena' => $tamaAlmacena,
                    ]
                );
            }

            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'data encontrada con exito',
                    'data' => $resultados,
                );
            }else {
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'no se hizo la peticion correctamente',
                    'data' => [],
                );
            }

            echo json_encode($res);
        }elseif($tabla === 'ram'){
            $resultados = [];
            $sql = "SELECT * from ram where ramGB = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idRam, $nameRam);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, [
                    'idRam' => $idRam,
                    'nameRam' => $nameRam,
                ]);
            }
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'ram encontrada con exito',
                    'data' => $resultados
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'hubo un error al hacer la peticion :)',
                );
            }

            echo json_encode($res);
        }elseif($tabla === 'tipo_sistema'){
            $resultados = [];
            $sql = "SELECT * from $tabla where id_tipo_sistema = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i' ,$id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $id, $nameTipSistema);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, [
                    'id' => $id,
                    'nameTipoSistema' => $nameTipSistema,
                ]);
            }
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'tipos de sistema encontrado con sistema',
                    'data' => $resultados,
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'error al intentar buscar!',
                );
            }

            echo json_encode($res);

        }elseif($tabla === 'procesadores'){
            $resultados = [];
            $sql = "SELECT * from procesadores where id_procesador = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idProcesadaor, $TamProcesador);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, [
                    'idProcesadaor' => $idProcesadaor,
                    'TamProcesador' => $TamProcesador,
                ]);
            }
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'Procesador encontrado con exito',
                    'data' => $resultados
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'hubo un error al hacer la peticion :)',
                );
            }

            echo json_encode($res);
            
        }elseif($tabla === 'disposi_ambientes'){
            $resultados = [];
            $sql = "SELECT * from $tabla where id_disposi_ambientes = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'i', $id);
            $ok = mysqli_stmt_execute($query);
            $ok = mysqli_stmt_bind_result($query, $idDisposiAmbientes,$idCompuPeris, $idAmbiente);
            while(mysqli_stmt_fetch($query)){
                array_push($resultados, [
                    'idDisposiAmbientes' => $idDisposiAmbientes,
                    'idCompuPeris' => $idCompuPeris,
                    'idAmbiente' => $idAmbiente,
                ]);
            }
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'Dispositivo ambiente encontrado con exito',
                    'data' => $resultados
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'Hubo un error al hacer la peticion',
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
    }elseif( $tabla === 'marca' ){
        insertTable($mysqli, $tabla, 'nom_marca', $_POST['nameTipo']);
    } elseif( $tabla === 'estado_dispositivo'  ){
        insertTable($mysqli, $tabla , 'nom_estado_dispositivo', $_POST['nameTipo']);
    } elseif( $tabla === 'estado_aprobacion' ){
        insertTable( $mysqli, $tabla, 'nom_aprobacion', $_POST['nameTipo']);
    } elseif( $tabla === 'estado_disponibilidad' ){
        insertTable($mysqli , $tabla , 'nom_estado_disponibilidad', $_POST['nameTipo']);
    } elseif ($tabla === 'nave'){
        insertTable($mysqli, $tabla , 'nom_nave', $_POST['nameTipo']);
    } elseif ($tabla === 'jornada'){
        insertTable($mysqli, $tabla , 'nom_jornada', $_POST['nameTipo']);
    } elseif ($tabla === 'formacion'){
        insertTable($mysqli, $tabla , 'nom_formacion', $_POST['nameTipo']);
    }elseif($tabla === 'tip_periferico'){
        insertTable($mysqli, $tabla, 'nom_tip_periferico', $_POST['nameTipo']);
    }elseif ($tabla === 'ram'){

        $sql = "INSERT INTO ram (ramGB, tamano_ram) VALUES (NULL, ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $_POST['memoriaRam']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
        }else{     
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }
        echo json_encode($res);

    }elseif ($tabla === 'tipo_sistema'){

        $sql = "INSERT INTO tipo_sistema (id_tipo_sistema, nom_tipo_sistema) VALUES (NULL, ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $_POST['sistema_op']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
        }else{     
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }
        echo json_encode($res);

    }elseif ($tabla === 'almacenamiento'){
        $sql = "INSERT INTO almacenamiento (id_almacena, tamano_almacena) VALUES (NULL, ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $_POST['tama_almace']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
        }else{     
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }

        echo json_encode($res);

    }elseif ($tabla === 'procesadores'){
        $sql = "INSERT INTO procesadores (id_procesador, nom_procesador) VALUES (NULL, ?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 's', $_POST['nom_procesador']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Registro insertado con exito',
            );
        }else{     
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede insertar el registro',
            );
        }
        echo json_encode($res);
    }
    elseif ($tabla === 'detalle_formacion'){
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
    } elseif ($tabla === 'ambiente'){
        $sql = "INSERT INTO ambiente (id_ambiente, id_nave , n_ambiente) VALUES (?, ?, ?)";
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
    }elseif($tabla === 'periferico'){
        try{
            $sql = "INSERT INTO periferico(id_periferico, id_tip_periferico, id_marca, estado_disponibilidad,estado_dispositivo, pulgadas,periferico.descripcion) values(?,?,?,?,?,?,?)";
            $query = mysqli_prepare($mysqli, $sql);
            $ok = mysqli_stmt_bind_param($query, 'siiiiis',$_POST['serialPeriferico'], $_POST['tipPeriferico'], $_POST['marcaPeriferico'], $_POST['estadoDisponibilidad'], $_POST['estadoDispositivo'], $_POST['pulgadas'], $_POST['caracteristicas']);
            $ok = mysqli_stmt_execute($query);
            mysqli_stmt_close($query);
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(201),
                    'statusText' => 'periferico agregado con exito',
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'no se pudo agregar el periferico'
                );
            }
            echo json_encode($res);
        }catch(Exception $ex){
            echo json_encode($ex);
        }
    }elseif ($tabla === 'fichas'){
        $sql = "INSERT INTO fichas (ficha, id_jornada, id_ambiente, id_formacion, instructor) VALUES (?, ?, ?, ?, ? )";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iiiii', $_POST['numero_ficha'],$_POST['tip_jornada'], $_POST['tip_ambiente'], $_POST['nom_formacion'], $_POST['doc_instruc'] );
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
    }elseif($tabla === 'dispositivo_electronico'){
        $sql = "INSERT INTO dispositivo_electronico(serial, placa_sena, id_tipo_dispositivo, id_procesador, ramGB, id_tipo_sistema, id_estado_disponibilidad, id_estado_dispositivo, id_marca, id_almacena)
        values(?,?,?,?,?,?,?,?,?,?)";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ssiiiiiiii', $_POST['serial'], $_POST['placaSena'], $_POST['idTipoDis'], $_POST['Procesador'], $_POST['RamGB'], $_POST['idTipoSiste'], $_POST['estadoDisponi'], $_POST['estadoDisposi'] ,$_POST['marca'], $_POST['Almacenamiento'] );
        $ok = mysqli_stmt_execute($query);
        $res ;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'dispositivo electronico creado con exito'
            );
        }else {
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'hubo un error al crear el dispositivo :V'
            );
        }

        echo json_encode($res);
    }elseif($tabla === 'compu_peris'){

        $sql = "INSERT INTO compu_peris(id_compu_peris, serial, id_periferico, fecha_compu_peris) values(null, ? , ? , CURDATE())";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'ss', $_POST['serialDispo'], $_POST['idPeriferico']);
        $ok = mysqli_stmt_execute($query);
        $res ;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Compu- peri creado con exito'
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'hubo  un error :)',
            );
        }

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
        $sql = "UPDATE $tabla set serial = ? , placa_sena =?, id_tipo_dispositivo =?, id_procesador = ?, ramGB = ?, id_tipo_sistema = ?,
        id_estado_disponibilidad = ?, id_estado_dispositivo = ?, id_marca = ?, id_almacena = ? where serial = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'siiiiiiiiis',$_PUT['serial'], $_PUT['placaSena'], $_PUT['TipoDispo'], $_PUT['nameProcesador'], $_PUT['RamGB'], $_PUT['select_tipo_sistema'],
                                    $_PUT['EstadoDisponibilidad'], $_PUT['EstadoDispositivo'], $_PUT['marca'], $_PUT['Almacenamiento'], $_PUT['serialAntiguo'] );
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Dispositivo electronico actualizado con exito',
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se logro actualizar el Dispositivo electronico',
            );
        }
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
    } 
    if ($_PUT['tabla'] === 'ambiente'){
        $sql = "UPDATE ambiente set  n_ambiente= ? , id_nave = ? 
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
        try{
            $sql = "UPDATE $tabla SET id_tipo_documento = ?, Cod_Carnet = ?, Nombres = ?, Apellidos = ?, fecha_nacimiento = ?, correo_personal = ?, correo_sena = ?, telefono = ?, id_genero = ? WHERE documento = ?";
            $query = mysqli_prepare($mysqli, $sql);
            $ok= mysqli_stmt_bind_param($query , 'iisssssiii' , $_PUT['select_tipo_docu'] , $_PUT['Cod_Carnet'], $_PUT['nombres'], $_PUT['apellidos'], $_PUT['fecha_nacimiento'], $_PUT['correo_personal'], $_PUT['correo_sena'], $_PUT['telefono'], $_PUT['select_tipo_genero'], $_PUT['documentoAntiguo']);
            $ok = mysqli_stmt_execute($query);
            mysqli_stmt_close($query);
            $res;
            if($ok){
                $res = array(
                    'err' => false,
                    'status' => http_response_code(200),
                    'statusText' => 'Usuario  modificado correctamente',
                );
            }else{
                $res = array(
                    'err' => true,
                    'status' => http_response_code(500),
                    'statusText' => 'No se puede modificar correctamente'
                );
            }
            echo json_encode($_PUT);
        }catch(Exception $ex){
            echo json_encode($ex);
        }
    }
    if($tabla === 'fichas'){
        $sql = "UPDATE $tabla SET  id_jornada = ?, id_ambiente = ?, id_formacion = ?, instructor = ? WHERE ficha = ? ";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'iiiii' , $_PUT['select_jornada'] , $_PUT['select_ambiente'], $_PUT['select_formacion'], $_PUT['select_instructor'], $_PUT['numero_ficha']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Ficha modificada correctamente'
            );
        }else{
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se logro modificar la ficha'
            );
        }
        echo json_encode($res);
    }
    if($tabla === 'tip_periferico'){
        $sql = "UPDATE $tabla set nom_tip_periferico = ? where id_tip_periferico = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'si', $_PUT['nomTipPeriferico'], $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Modificado con exito'
            );
        }else{
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'No se puede modificar tus registros'
            );
        }
        echo json_encode($res);
    }
    if( $tabla === 'periferico' ){ 
        $sql = 'UPDATE periferico SET id_tip_periferico = ?, id_marca = ?, 
        estado_disponibilidad = ?, estado_dispositivo = ? , pulgadas = ?, descripcion = ?
        where id_periferico = ?';
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query ,'iiiiisi',$_PUT['tipPeriferico'], $_PUT['marca'], $_PUT['estadoDisponibilidad'], $_PUT['estadoDispositivo'], $_PUT['pulgadas'], $_PUT['descripcion'], $_PUT['idPeriferico']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if( $ok ){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Periferico modificado con exito'
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede modificar este periferico intentalo nuevamente'
            );
        }

        echo json_encode($res);
    }
    if($tabla == 'compu_peris'){
        $sql = "UPDATE compu_peris set serial = ? , id_periferico = ?, fecha_compu_peris = ? where id_compu_peris = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'sssi', $_PUT['serialDispo'], $_PUT['idPeriferico'], $_PUT['dateCompuPeris'], $_PUT['idCompuDispo']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'registro actualizado correctamente',
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'ha ocurridó un error al inetentar actualizar'
            );
        }

        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'almacenamiento'){
        $sql = "UPDATE $tabla set tamano_almacena = ? where id_almacena = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok= mysqli_stmt_bind_param($query , 'ss' , $_PUT['tama_almacena'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'estado de aprobacion modificado correctamente'
        );
        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'ram'){
        $sql = 'UPDATE ram set tamano_ram = ? where ramGB = ?';
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query , 'si', $_PUT['ramName'], $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        // mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'actualizada con exito'
            );
        }else {
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede actualizar memoria ram'
            );
        }  

        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'tipo_sistema'){
        $sql = 'UPDATE tipo_sistema set nom_tipo_sistema = ? where id_tipo_sistema = ?';
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'si', $_PUT['soName'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'SO modificado con exito',
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statustext' => 'error al cambiar',
            );
        }

        echo json_encode($res);
    }
    if($_PUT['tabla'] === 'procesadores'){
        $sql = 'UPDATE procesadores set nom_procesador  = ? where id_procesador = ?';
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'si', $_PUT['TamProcesador'] , $_PUT['id']);
        $ok = mysqli_stmt_execute($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Procesador modificado con exito',
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statustext' => 'error al cambiar',
            );
        }

        echo json_encode($res);

    } if($_PUT['tabla'] === 'disposi_ambientes'){
        $sql = 'UPDATE disposi_ambientes set  id_compu_peris   = ? , id_ambiente  = ? where id_disposi_ambientes  = ?';
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'iii', $_PUT['CompuPeris'] , $_PUT['Ambiente'], $_PUT['idDispoAmbi']);
        $ok = mysqli_stmt_execute($query);
        $res;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Dispositivo Ambiente modificado con exito',
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statustext' => 'Error al cambiar',
            );
        }

        echo json_encode($res);
    }
    


}elseif($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $_DELETE = json_decode(file_get_contents('php://input'), true);
    $tabla = $_DELETE['tabla'];
    $id = $_DELETE['id'];
    if($tabla !== 'dispositivo_electronico' && $tabla !== 'usuarios' && $tabla !== 'fichas' && $tabla !== 'compu_peris' && $tabla !== 'ram' && $tabla !== 'almacenamiento' && $tabla !== 'tipo_sistema' && $tabla !== 'procesadores' && $tabla !== 'disposi_ambientes'){
        $sql = "DELETE from $tabla where id_$tabla = ?";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 's' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => "Registro borrado con exito!'# $id",
            );
        }else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se logro borrar el registro',
            );
        }
        echo json_encode($res);
    }
    if($tabla === 'ram' ){
        $sql = "DELETE from $tabla where ramGB = ? ";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 'i' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Registro borrado con exito!',
        );
        echo json_encode($res);
    }
    if($tabla === 'almacenamiento' ){
        $sql = "DELETE from $tabla where id_almacena = ? ";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 'i' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Registro borrado con exito!',
        );
        echo json_encode($res);
    }
    if($tabla === 'procesadores' ){
        $sql = "DELETE from $tabla where id_procesador = ? ";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 'i' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res;
        if($ok){
            $res = array (
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'Procesador borrado con exito!',
            );
        }else{
            $res = array (
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'Procesador no se logro eliminar',
            );
        }
        
        echo json_encode($res);
    }
    if($tabla === 'tipo_sistema' ){
        $sql = "DELETE from $tabla where id_tipo_sistema = ? ";
        $query = mysqli_prepare($mysqli , $sql);
        $ok = mysqli_stmt_bind_param($query, 'i' , $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res = array (
            'err' => false,
            'status' => http_response_code(200),
            'statusText' => 'Registro borrado con exito!',
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
            'statusText' => 'Registro borrado con exito!',
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
    if($tabla === 'fichas' ){
        $sql = "DELETE from $tabla where ficha = ? ";
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

    }if($tabla === 'disposi_ambientes'){
        $sql = "DELETE from $tabla where id_disposi_ambientes = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'i', $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res ;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'registro borrado con exito'
            );
        }
        else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede borrar este registro'
            );
        }

        echo json_encode($res);

    }

    if($tabla === 'compu_peris'){
        $sql = "DELETE from $tabla where id_compu_peris = ?";
        $query = mysqli_prepare($mysqli, $sql);
        $ok = mysqli_stmt_bind_param($query, 'i', $id);
        $ok = mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        $res ;
        if($ok){
            $res = array(
                'err' => false,
                'status' => http_response_code(200),
                'statusText' => 'registro borrado con exito'
            );
        }
        else{
            $res = array(
                'err' => true,
                'status' => http_response_code(500),
                'statusText' => 'no se puede borrar este registro'
            );
        }

        echo json_encode($res);

    }

}