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
    $id_estado_aprobacion = 2;


    $consulta1 = "INSERT INTO usuarios(documento,id_tipo_documento,id_tipo_usuario,Cod_Carnet,Nombres,Apellidos,
    fecha_nacimiento,id_genero,correo_personal,correo_sena,telefono,password,foto) values($cedula,$tip_doc,$tip_usu,$cod_carnet,
    '$nom','$ape','$date',$genero,'$correo_p','$correo_s',$tell,'$password','$imagen')";
    $ejecu = mysqli_query($mysqli,$consulta1);



    $consulta2 = "INSERT INTO ambiente(id_ambiente,id_nave) values($n_number_ambiente,$nave)";
    $ejecu2=mysqli_query($mysqli,$consulta2);
 

    $consulta3 = "INSERT INTO detalle_formacion(id_formacion,num_ficha,id_ambiente) 
    values($formacion,$n_ficha,$n_number_ambiente)";
    $ejecu3 = mysqli_query($mysqli,$consulta3);


    $consulta4 = "SELECT MAX(`id_detalle_formacion`) FROM detalle_formacion";
    $ejecu4=mysqli_query($mysqli,$consulta4);
    $dato = mysqli_fetch_assoc($ejecu4);

    if($dato){
        $id_detalle_formacion= $dato["MAX(`id_detalle_formacion`)"];

        echo $id_detalle_formacion;
    }

    $consulta5 = "INSERT INTO matricula(id_detalle_formacion,documento,fecha_matricula,id_jornada)
    values($id_detalle_formacion,$cedula,'$date_matricula',$jornada)";
    $ejecu5 = mysqli_query($mysqli,$consulta5);

    $consulta6 = "INSERT INTO aceptacion_usuarios(documento,id_estado_aprobacion) 
    values ($cedula,$id_estado_aprobacion)";
    $ejecu6 = mysqli_query($mysqli,$consulta6);

 
    

    if($ejecu){

        if($ejecu2){

            if($ejecu3){

                if($ejecu4){

                    if($ejecu5){

                            if($ejecu6){
                                echo "<script> alert('registro exitoso!');
                                window.location= '../index.html';
                                </script>";
                            }else{
                                echo "<script> alert('NO Funciono el registro 6'); </script>";
                            }
                        
                    }else{
                        echo "<script> alert('NO Funciono el registro 5'); </script>";
                    }
                }else{
                    echo "<script> alert('NO Funciono el registro 4'); </script>";
                }
            }else{

                echo "<script> alert('NO Funciono el registro 3'); </script>";
            }
        }else{
            echo "<script> alert('NO Funciono el registro 2'); </script>";
        }
    }else{
        echo "<script> alert('NO Funciono el registro 1'); </script>";
    }
}


?>