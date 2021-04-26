<?php
include '../conexion/conexion.php';

    $doc = $_POST['doc'];
    $tip_doc = $_POST['tip_doc'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['date'];
    $cel = $_POST['num'];
    $direc = $_POST['direc'];
    $correo = $_POST['email'];
    $clave = $_POST['clave'];
    $tip_usu = $_POST['tip_usu'];

    $sql="INSERT INTO usuarios SET documento = '$doc', nombre_completo = '$nombre', fecha_nacimiento = '$fecha',
    celular = '$cel', direccion = '$direc', email = '$correo', clave = '$clave', id_tip_doc = '$tip_doc', id_tip_usu = '$tip_usu')";
    $query= mysqli_query($mysqli,$sql);
    if (!$query){
        echo'Error al registrarse';
    }else{
        echo'Usuario registrado correctamente';
    }
    mysqli_close($mysqli);

?>