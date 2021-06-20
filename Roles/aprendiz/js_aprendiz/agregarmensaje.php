<?php
include('../../../includes/conexion.php');

if(isset($_POST['enviarinicial'])){

    $mensajeinicio = $_POST['mensajeinicio'];
    $id = $_POST['id_asignacion_inicio'];

    $consulta = "UPDATE asignacion_equipos SET descripcion_inicial='$mensajeinicio' 
    where id_asignacion_equipos='$id'";
    $ejecicion1 = mysqli_query($mysqli, $consulta);
    if(!$ejecicion1){
        die('error');
    }else{
        echo "<script> alert('Envío el estado en el que se encontró su equipo de computo correctamente!');
        window.location= '../aprendiz.php';
        </script>";
        exit();
    }
   


}

?>