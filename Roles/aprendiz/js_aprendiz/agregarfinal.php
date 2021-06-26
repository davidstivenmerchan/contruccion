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

    if(!$ejecicion1 && !$ejecucion2){
        die('error');
    }else{
        echo "<script> alert('Envío el estado en el que dejo su equipo de computo correctamente!');
        window.location= '../aprendiz.php';
        </script>";
        exit();
    }


}

?>