<?php
require_once './conexion.php';
session_start();

if (isset($_POST['ingresar'])){

    $usuario=$_POST['re_usu'];
    $clave=$_POST['re_con'];

    $sql="SELECT * FROM usuarios WHERE documento='$usuario' AND password='$clave'";
    $query= mysqli_query($mysqli,$sql);
    $datos= mysqli_fetch_assoc($query);

    // var_dump($datos);
    if ($datos){

        $_SESSION['cc'] = $datos['cedula'];
        $_SESSION['tipo_doc'] = $datos['id_tipo_documento'];
        $_SESSION['tipo_usu'] = $datos['id_tipo_usuario'];
        $_SESSION['cod_carnet'] = $datos['Cod_Carnet'];
        $_SESSION['nombre'] = $datos['Nombres'];
        $_SESSION['apellido'] = $datos['Apellidos'];
        $_SESSION['fecha'] = $datos['fecha_nacimiento'];
        $_SESSION['genero'] = $datos['genero'];
        $_SESSION['correo_p'] = $datos['correo_personal'];
        $_SESSION['correo_s'] = $datos['correo_sena'];
        $_SESSION['tel'] = $datos['telefono'];
        $_SESSION['clave'] = $datos['password'];
        
    
       
        

        
        if($_SESSION['tipo_usu']==1){
            header("location: ../Roles/admi/admin.php");
            exit();
        }
        if($_SESSION['tipo_usu']==2){
            header("location: ../Roles/instru/instructor.php");
            exit();
        }
        else{
            header("location: error.html");
            exit();
        }

    }

}else {
    echo "ñero aca hay nada";
}


