<?php
     require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];
    $consulta = "SELECT nom_formacion from formacion where id_formacion = $id";
    $eje = mysqli_query($mysqli, $consulta);
    $di = mysqli_fetch_assoc($eje);
    $im = implode($di);

    $consulta1 = "DELETE FROM formacion where id_formacion='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);
    

    

    if($ejecucion){
        echo "<script> alert('Se ha eliminado la formacion $im!');
            window.location= '../admin.php';
            </script>";
    }


   
?>