<?php

include('../includes/conexion.php');

if(isset($_POST['enviar'])){


    $cedula = $_POST['cc'];
    $cod_carnet = $_POST['cod_carnet'];
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $genero = $_POST['genero'];
    $correo_p = $_POST['correo_p'];
    $correo_s = $_POST['correo_s'];
    $tell = $_POST['tell'];
    $password = $_POST['password'];
    $tip_doc = $_POST['tip_doc'];
    $tip_usu = 2;
    $date = $_POST['date'];
    $imagen = $_POST['imagen'];
    $formacion = $_POST['formacion'];
    $n_ficha = $_POST['n_ficha'];
    $nave = $_POST['nave'];
    $jornada = $_POST['jornada'];
    $n_number_ambiente = $_POST['n_number_ambiente'];
    $date_matricula = $_POST['date_matricula'];


    $consulta1 = "INSERT INTO usuarios(documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,
    fecha_nacimiento,genero,correo_personal,correo_sena,telefono,password,foto) values($cedula,$tip_doc,$tip_usu,$cod_carnet,
    '$nom','$ape','$date','$genero','$correo_p','$correo_s',$tell,'$password','$imagen')";
    $ejecu = mysqli_query($mysqli,$consulta1);

    if($ejecu){
        echo "<script> alert('Funciono el registro'); </script>";
    }else{
        echo "<script> alert('NO Funciono el registro'); </script>";
    }









}








?>