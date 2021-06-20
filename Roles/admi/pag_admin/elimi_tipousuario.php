<?php
    require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];

    $consulta1 = "DELETE FROM tipo_usuario where id_tipo_usuario='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);

    

    if($ejecucion){
        echo "<script> alert('eliminacion exitosa!');
            window.location= '../admin.php';
            </script>";
    }
?>