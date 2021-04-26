<?php
include '../conexion/conexion.php';

    $serial = $_POST['codigo'];
    $modelo = $_POST['modelo'];
    $tip_dis = $_POST['tip_dis'];
    $marca = $_POST['marca'];
    $estado = $_POST['estado'];
    
    $sql="INSERT INTO equipos SET serial = '$serial', modelo = '$modelo', id_tip_dis = '$tip_dis', id_marca = '$marca', id_estado = '$estado')";
    $query= mysqli_query($mysqli,$sql);
    if (!$query){
        echo'Error al registrarse';
    }else{
        echo'Usuario registrado correctamente';
    }
    mysqli_close($mysqli);

?>
