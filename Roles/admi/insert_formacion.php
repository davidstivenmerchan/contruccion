<?php
include('../../includes/conexion.php');

    $id_formacion = $_POST['id_formacion'];
    $nom_formacion = $_POST['nom_formacion'];
    

    $sql = "INSERT INTO formacion(id_formacion, nom_formacion) VALUES ('$id_formacion','$nom_formacion')";
    $query= mysqli_query($mysqli,$sql);
    if (!$query){
        echo'Error al registrarse';
    }else{
        echo'Formacion registrada correctamente';
    }
    mysqli_close($mysqli);
?>