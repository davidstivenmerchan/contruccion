<?php
include('../../../includes/conexion.php');

if(isset($_POST['mensaje'])){

    $mensajeinicio = $_POST['mensaje'];
    $id = $_POST['id'];

    $consulta = "UPDATE asignacion_equipos SET descripcion_inicial='$mensajeinicio' 
    where id_asignacion_equipos='$id'";
    $ejecicion1 = mysqli_query($mysqli, $consulta);
    if(!$ejecicion1){
        die('error');
    }
    echo "funciona";


}

?>