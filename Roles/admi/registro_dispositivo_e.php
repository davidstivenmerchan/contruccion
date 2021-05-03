<?php

include('../../includes/conexion.php');

if(isset($_POST['registrar'])){

    $serial = $_POST['serial'];
    $placa_sena = $_POST['placa_sena'];
    $nom_dispositivo = $_POST['nom_dispositivo'];
    $id_tipo_dis = $_POST['id_tipo_dis'];
    $estado_disponi = $_POST['estado_disponi'];
    $estado_disposi = $_POST['estado_disposi'];
    $marca = $_POST['marca'];
    
    $consulta = "INSERT INTO dispositivo_electronico(serial, placa_sena,id_tipo_dispositivo,
    nom_dispositivo,id_estado_disponibilidad,id_estado_dispositivo,id_marca) values($serial,'$placa_sena',
    $id_tipo_dis,'$nom_dispositivo',$estado_disponi,$estado_disposi,$marca)";

    $query =  mysqli_query($mysqli,$consulta);

    if($query){
        echo "<script> alert('Funciono el registro'); </script>";
    }else{
        echo "<script> alert('NOOOO Funciono el registro'); </script>";
    }


}

?>