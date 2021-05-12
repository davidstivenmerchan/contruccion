<?php
     require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];

    $consulta1 = "DELETE FROM usuarios where documento='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);

    

    if($ejecucion){
        echo "<script> alert('REGISTRO ELIMINADO CORRECTAMENTE'); </script>";
    }


   
?>