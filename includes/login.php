<?php

session_start();

require_once 'conexion.php';

?>
<?php
if (isset($_POST['ingresar'])){

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];

    $sql="SELECT * FROM usuarios WHERE documento='$usuario' AND password='$clave'";
    $query= mysqli_query($mysqli,$sql);
    $datos= mysqli_fetch_assoc($query);

    // var_dump($datos);
    if ($datos){
 
        $_SESSION['cc'] = $datos['documento'];
        $_SESSION['tipo_doc'] = $datos['id_tipo_documento'];
        $_SESSION['tipo_usu'] = $datos['id_tipo_usuario'];
        $_SESSION['cod_carnet'] = $datos['Cod_Carnet'];
        $_SESSION['nombre'] = $datos['Nombres'];
        $_SESSION['apellido'] = $datos['Apellidos'];
        $_SESSION['fecha'] = $datos['fecha_nacimiento'];
        $_SESSION['genero'] = $datos['id_genero'];
        $_SESSION['correo_p'] = $datos['correo_personal'];
        $_SESSION['correo_s'] = $datos['correo_sena'];
        $_SESSION['tel'] = $datos['telefono'];
        $_SESSION['clave'] = $datos['password'];
        
    
        switch($_SESSION['tipo_usu']){
            case 1:
                header("location: ../Roles/admi/admin.php");
                exit();
            case 2:
                header("location: ../Roles/aprendiz/aprendiz.php");
                exit();
            case 3:
                header("location: ../Roles/instru/instructor.php");
                exit();
            default:
                header("location: ../error.html");
                exit();
                
        }
    }else{
        echo "<script> alert('VERIFIQUE SU CONTRASEÑA O DOCUMENTO. ERROR AL INGRESAR');
            window.location= '../index.html';
            </script>";
        exit();
    }

}else {
    echo "ñero aca hay nada";
}


?>