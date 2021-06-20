<?php
    require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];
    $consulta = "SELECT num_ficha from detalle_formacion where id_detalle_formacion = $id";
    $eje = mysqli_query($mysqli, $consulta);
    $di = mysqli_fetch_assoc($eje);
    $im = implode($di);

    $consulta1 = "DELETE FROM detalle_formacion where id_detalle_formacion='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);

    if($ejecucion){
        echo "<script> alert('Se ha eliminado La ficha $im!');
            window.location= '../admin.php';
            </script>";
    }
?>