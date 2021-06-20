<?php
    require_once '../../../includes/conexion.php';
?>
<?php


    $id = $_GET['id'];

    $consulta1 = "DELETE FROM tipo_documento where id_tipo_documento='$id' ";
    $ejecucion =  mysqli_query($mysqli,$consulta1);

    

    if($ejecucion){
        echo "<script> alert('eliminacion exitosa!');
            window.location= '../admin.php';
            </script>";
    }
?>