<?php


$horaHoy = date("H:i:s"); 

include('../../../includes/conexion.php');

if(isset($_POST['enviarfinal'])){

    $mensajefinal = $_POST['mensajefinal'];
    $id = $_POST['id_asignacion_inicioo'];

    $consulta = "UPDATE asignacion_equipos SET descripcion_final='$mensajefinal', hora_final='$horaHoy' 
    where id_asignacion_equipos='$id'";
    $ejecicion1 = mysqli_query($mysqli, $consulta);
    if(!$ejecicion1){
        die('error');
    }else{
        echo "<script> alert('Envío el estado en el que dejo su equipo de computo correctamente!');
        window.location= '../aprendiz.php';
        </script>";
        exit();
    }


}

?>