<?php
    require_once ('../../../includes/conexion.php');

    $buscar = $_POST['buscar_con_cedula'];

    if(!empty($buscar)){
        $query = "SELECT entrada_aprendiz.documento, equipos.serial, 
        entrada_aprendiz.fecha, asignacion_equipos.hora_inicial, 
        asignacion_equipos.descripcion_inicial, asignacion_equipos.hora_final,
        asignacion_equipos.descripcion_final FROM asignacion_equipos, entrada_aprendiz, equipos 
        where entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz and
        equipos.id_equipo=asignacion_equipos.id_equipo and entrada_aprendiz.documento LIKE '$buscar%'";
        $resul = mysqli_query($mysqli,$query);
        if(!$resul){
            die('query error'. mysqli_error($mysqli));
        }else{ 
            $json = array();
            while($row = mysqli_fetch_array($resul)){
                $json[] = array(
                    'documento' => $row['documento'],
                    'serial' => $row['serial'],
                    'fecha' => $row['fecha'],
                    'hora_inicial' => $row['hora_inicial'],
                    'descripcion_inicial' => $row['descripcion_inicial'],
                    'hora_final' => $row['hora_final'],
                    'descripcion_final' => $row['descripcion_final']
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }
       
    }
?>