<?php
require_once ('../conexion/conexion.php');

if ($_POST['boton']){

    $doc = $_POST['doc'];

    $con = "SELECT * FROM usuarios WHERE documento = '$doc'";
    $query = mysqli_query($mysqli,$con);
    $datos= mysqli_fetch_assoc($query);

    if ($datos){
        $_SESSION['nombre'] = $datos['nombre_completo'];
        $_SESSION['fecha'] = $datos['fecha_nacimiento'];
        $_SESSION['celular'] = $datos['celular'];
        $_SESSION['direccion'] = $datos['direccion'];
        $_SESSION['correo'] = $datos['email'];
        $_SESSION['tipo_doc'] = $datos['id_tip_doc'];
        $_SESSION['tipo_usu'] = $datos['id_tip_usu'];

        if($_SESSION['tipo_usu']==3){
            if (!$query){
                echo 'Este aprendiz no existe';
            }else{
                $buscar = "SELECT serial FROM equipos WHERE id_estado = 2";
                $query2 = mysqli_query($mysqli,$buscar);
                if ($query2){
                    $insertar = "INSERT INTO asignacion SET id_asignacion = '', documento = '$doc', serial = '$buscar', feho_ini = '', feho_fin = ''";
                    $query3 = mysqli_query($mysqli,$insertar);
                    $fila = mysqli_fetch_assoc($query3);
                    if ($fila){
                        $_SESSION['serial'] = $fila['serial'];
                        $_SESSION['model'] = $fila['modelo'];
                        $_SESSION['tip_dis'] = $fila['id_tip_dis'];
                        $_SESSION['marca'] = $fila['id_marca'];
                        $_SESSION['estado'] = $fila['id_estado'];
        
                        if ($_SESSION['estado'] == 2){
                            $cambiar = "UPDATE equipos SET id_estado = '1' WHERE estado.id_estado = equipos.id_estado";
                            $query3 = mysqli_query($mysqli,$cambiar);
                            if (!$query3){
                                echo ('no se pudo hacer la autommatizacion');
                            }    
                        }
                    }
                }
            }
        }
    }

    
}
?>