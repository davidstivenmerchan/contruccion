<?php
include('../../includes/conexion.php');

    $id_jornada = $_POST['id_jornada'];
    $nom_jornada = $_POST['nom_jornada'];
    

    $sql = "INSERT INTO jornada(id_jornada, nom_jornada) VALUES ('$id_jornada','$nom_jornada')";
    $query= mysqli_query($mysqli,$sql);
    if (!$query){
        echo'Error al registrarse';
    }else{
        echo'Jornada registrada correctamente';
    }
    mysqli_close($mysqli);
?>