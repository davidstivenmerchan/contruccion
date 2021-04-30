<?php

include('../conexion/conexion.php');

if(isset($_POST['enviar1'])){

    $cc = $_POST['doc'];
    $tipdoc= $_POST['tip_doc'];
    $tipusu= $_POST['tip_usu'];
    $cod= $_POST['codigo'];
    $nombre= $_POST['nom'];
    $ape= $_POST['ape'];
    $fecha= $_POST['fecha'];
    $genero= $_POST['genero'];
    $emailp= $_POST['email_per'];
    $emails= $_POST['email_sena'];
    $clave= $_POST['clave'];
    $img= $_POST['imagen'];
  

    $consul = "INSERT INTO usuarios(documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,fecha_nacimiento,genero,correo_personal,correo_sena,password,foto) 
    values ($cc,$tipdoc,$tipusu,$cod,'$nombre','$ape','$fecha','$genero','$emailp','$emails','$clave','$img')";

    $resultados = mysqli_query($mysqli,$consul);
   

    if($resultados){
        echo "<script> alert('Funciono el registro'); </script>";
    }else{
        echo "<script> alert('noooooooo Funciono el registro'); </script>";
    }

    
}

if(isset($_POST['enviar2'])){

    $iddoc = $_POST['id_doc'];
    $nomdoc= $_POST['nom_doc'];
   
  

    $consul2 = "INSERT INTO tipo_documento (id_tipo_documento,nom_documento) values ($iddoc,'$nomdoc')";

    $resultados2 = mysqli_query($mysqli,$consul2);
    

    if($resultados2){
        echo "<script> alert('Funciono el registro 2'); </script>";
    }

    
}
if(isset($_POST['enviar3'])){

    $idusu = $_POST['id_usu'];
    $nomusu= $_POST['nom_usu'];
   
  

    $consul3 = "INSERT INTO tipo_usuario (id_tipo_usuario,nom_tipo_usuario) values ($idusu,'$nomusu')";

    $resultados3 = mysqli_query($mysqli,$consul3);
    

    if($resultados3){
        echo "<script> alert('Funciono el registro 3'); </script>";
    }

    
}





?>