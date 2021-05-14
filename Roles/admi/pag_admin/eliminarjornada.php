<?php
     require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];
    $consulta = "SELECT nom_jornada from jornada where id_jornada = $id";
    $eje = mysqli_query($mysqli, $consulta);
    $di = mysqli_fetch_assoc($eje);
    $im = implode($di);

    $consulta1 = "DELETE FROM jornada where id_jornada='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);
    

    

    if($ejecucion){
        echo "<script> alert('Se ha eliminado La Jornada $im!');
            window.location= '../admin.php';
            </script>";
    }


   
?>