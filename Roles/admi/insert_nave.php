<?php
include('../../includes/conexion.php');

    
    $nom_nave = $_POST['nom_nave'];
    

    $sql = "INSERT INTO nave(id_nave, nom_nave) VALUES (0,'$nom_nave')";
    $query= mysqli_query($mysqli,$sql);
    if (!$query){
        echo'Error al registrarse';
    }else{
        echo'Nave registrada correctamente';
    }
    mysqli_close($mysqli);
?>