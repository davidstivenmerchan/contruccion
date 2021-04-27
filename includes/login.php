<?php
require_once ("../conexion/conexion.php");

if ($_POST['ingresar']){

    $usuario=$_POST['re_usu'];
    $clave=$_POST['re_con'];

    $sql="SELECT * FROM usuarios WHERE documento='$usuario' AND clave='$clave'";
    $query= mysqli_query($mysqli,$sql);
    $datos= mysqli_fetch_assoc($query);

    if ($datos){
        $_SESSION['nombre'] = $datos['nombre_completo'];
        $_SESSION['fecha'] = $datos['fecha_nacimiento'];
        $_SESSION['celular'] = $datos['celular'];
        $_SESSION['direccion'] = $datos['direccion'];
        $_SESSION['correo'] = $datos['email'];
        $_SESSION['tipo_doc'] = $datos['id_tip_doc'];
        $_SESSION['tipo_usu'] = $datos['id_tip_usu'];

        
        if($_SESSION['tipo_usu']==1){
            header("location: ../Roles/administrador.php");
            exit();
        }
        if($_SESSION['tipo_usu']==2){
            header("location: ../Roles/instructor.php");
            exit();
        }
        else{
            header("location: error.htmls");
            exit();
        }

    }

}


