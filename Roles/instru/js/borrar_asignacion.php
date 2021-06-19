<?php

    require_once ('../../../includes/conexion.php');

    $documento = $_POST['id'];

    $consulta = "SELECT id_entrada_aprendiz from entrada_aprendiz where documento = '$documento'";
    $ejecucion = mysqli_query($mysqli, $consulta);
    $mostrar = mysqli_fetch_array($ejecucion);
    if($mostrar){
        $id_entrada = $mostrar['id_entrada_aprendiz'];
    }

    $consulta4 = "SELECT asignacion_equipos.id_equipo, equipos.serial FROM 
    asignacion_equipos, equipos where equipos.id_equipo=asignacion_equipos.id_equipo 
    and id_entrada_aprendiz='$id_entrada'";
    $ejecucion4 = mysqli_query($mysqli,$consulta4);
    $mostrar2 = mysqli_fetch_array($ejecucion4);
    if($mostrar2){
        $serial2 = $mostrar2['serial'];
    }

    $consulta5 = "UPDATE dispositivo_electronico SET dispositivo_electronico.id_estado_disponibilidad = 1 
    where serial='$serial2' ";
    $ejecucion5 =mysqli_query($mysqli,$consulta5);

    $consulta2 = "DELETE FROM asignacion_equipos where id_entrada_aprendiz='$id_entrada'";
    $ejecucion2 = mysqli_query($mysqli, $consulta2);

    $consulta3 = "DELETE FROM entrada_aprendiz where documento= '$documento' ";
    $ejecucion3 = mysqli_query($mysqli,$consulta3);

    
    

    if(!$ejecucion and !$ejecucion2 and !$ejecucion3 and !$ejecucion4 and !$ejecucion5){
        die('fallo');
    }
    echo 'eliminado correctamente '.$serial2;


?>