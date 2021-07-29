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
    $ficha =$_POST['ficha'];
    $date_matricula = $_POST['date_matricula'];
    $id_estado_aprobacion = 2;


    $consulta1 = "INSERT INTO usuarios(documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,
    fecha_nacimiento,id_genero,correo_personal,correo_sena,telefono,password) values($cedula,$tip_doc,$tip_usu,$cod_carnet,
    '$nom','$ape','$date',$genero,'$correo_p','$correo_s',$tell,'$password')";
    $ejecu = mysqli_query($mysqli,$consulta1);

    $consulta2 = "INSERT INTO matricula(ficha,aprendiz,fecha_matricula)
    values($ficha,$cedula,'$date_matricula')";
    $ejecu2 = mysqli_query($mysqli,$consulta2);

    $consulta3 = "INSERT INTO aceptacion_usuarios(documento,id_estado_aprobacion) 
    values ($cedula,$id_estado_aprobacion)";
    $ejecu3 = mysqli_query($mysqli,$consulta3);

 
    

    if($ejecu){

        if($ejecu2){

            if($ejecu3){
                            echo "<script> alert('registro exitoso!');
                                window.location= '../index.html';
                                </script>";

            }else{
                echo "<script> alert('NO Funciono el registro en tabla aceptacion'); 
                window.location= '../index.html';
                </script>";
            }
        }else{
            echo "<script> alert('NO Funciono el registro en tabla matricula'); 
            window.location= '../index.html';
            </script>";
        }
    }else{
        echo "<script> alert('NO Funciono el registro porque esa cedula ya esta registrada!'); 
        window.location= '../index.html';
        </script>";
    }
    
}


?>