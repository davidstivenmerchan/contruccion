<?php


$horaHoy = date("H:i:s"); 

include('../../../includes/conexion.php');

if(isset($_POST['enviarfinal'])){

    $mensajefinal = $_POST['mensajefinal'];
    $id = $_POST['id_asignacion_inicioo'];
    $cc = $_POST['cedu'];

    

    $consulta = "UPDATE asignacion_equipos SET descripcion_final='$mensajefinal', hora_final='$horaHoy' 
    where id_asignacion_equipos='$id'";
    $ejecicion1 = mysqli_query($mysqli, $consulta);

    $consulta2="UPDATE entrada_aprendiz SET hora_salida = '$horaHoy' where documento='$cc'";
    $ejecucion2=mysqli_query($mysqli, $consulta2);

    $consulta3 ="SELECT entrada_aprendiz.documento, equipos.serial from entrada_aprendiz, asignacion_equipos, equipos where entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz
    and equipos.id_equipo=asignacion_equipos.id_equipo";
    $ejecucion3 = mysqli_query($mysqli, $consulta3);
    $mostrar3= mysqli_fetch_array($ejecucion3);
    if($mostrar3){
        $serial = $mostrar3['serial'];
    }

    

    $consulta4 = "UPDATE dispositivo_electronico set dispositivo_electronico.id_estado_disponibilidad=1 
                 where dispositivo_electronico.serial=$serial";
    
    $ejecucion4 = mysqli_query($mysqli, $consulta4);


    if(!$ejecicion1 && !$ejecucion2 && !$ejecucion3 && !$ejecucion4 ){
        die('error');
    }else{
        echo "<script> alert('Envío el estado en el que dejo su equipo de computo correctamente!');
        window.location= '../aprendiz.php';
        </script>";
        exit();
    }


}

?>