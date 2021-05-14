<?php
     require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];
    $consulta = "SELECT nom_nave from nave where id_nave = $id";
    $eje = mysqli_query($mysqli, $consulta);
    $di = mysqli_fetch_assoc($eje);
    $im = implode($di);

    $consulta1 = "DELETE FROM nave where id_nave='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);
    

    

    if($ejecucion){
        echo "<script> alert('Se ha eliminado La $im!');
            window.location= '../admin.php';
            </script>";
    }


   
?>