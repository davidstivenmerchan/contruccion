<?php
    include('../../includes/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/mostrar_usu.css">
</head>
<body>

        <table class="documento" style="margin: 50px;" border="1">
            <tr>
                <td>Id Tipo Documento</td>
                <td>Nombre Tipo Documento</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_documento";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['id_tipo_documento'] ?></td>
                <td><?php echo $mostrar['nom_documento'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>


        <table class="dispositivo" style="margin: 50px;" border="1">
            <tr>
                <td>Id Tipo Dispositivo</td>
                <td>Nombre Tipo Dispositivo</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_dispositivo";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['id_tipo_dispositivo'] ?></td>
                <td><?php echo $mostrar['nom_tipo_dispositivo'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>

        <table class="tipo_usuario" style="margin: 50px;" border="1">
            <tr>
                <td>Id Tipo Usuario</td>
                <td>Nombre Tipo Usuario</td>
            </tr>

            <?php
                $sql="SELECT * FROM tipo_usuario";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['id_tipo_usuario'] ?></td>
                <td><?php echo $mostrar['nom_tipo_usuario'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>


        <table class="salida" style="margin: 50px;" border="1">
            <tr>
                <td>Id Salida</td>
                <td>Fecha Salida</td>
                <td>Hora Salida</td>
                <td>Documento Aprendiz</td>
                <td>Documento Instructor</td>
                <td>Estado Aprobacion</td>
                <td>Descripcion Salida</td>
            </tr>

            <?php
                $sql="SELECT * FROM salida";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['id_salida'] ?></td>
                <td><?php echo $mostrar['fecha_salida'] ?></td>
                <td><?php echo $mostrar['hora_salida'] ?></td>
                <td><?php echo $mostrar['aprendiz_documento'] ?></td>
                <td><?php echo $mostrar['instructor_documento'] ?></td>
                <td><?php echo $mostrar['id_estado_aprobacion'] ?></td>
                <td><?php echo $mostrar['descripcion_salida'] ?></td>
                
            </tr>
            
                <?php
                }
                ?>
        
        </table>

        <table class="usuario" style="margin: 50px;" border="1">
            <tr>
                <td>Documento</td>
                <td>Tipo Documento</td>
                <td>Tipo Usuario</td>
                <td>Cod Carnet</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Fecha Nacimiento</td>
                <td>Genero</td>
                <td>Correo Personal</td>
                <td>Correo SENA</td>
                <td>Telefono</td>
            </tr>

            <?php
                 $sql="SELECT documento, nom_documento,nom_tipo_usuario,Cod_Carnet,Nombres,Apellidos,fecha_nacimiento,genero,correo_personal,correo_sena,telefono
                        FROM usuarios,tipo_documento,tipo_usuario
                        WHERE usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                        AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['documento'] ?></td>
                <td><?php echo $mostrar['nom_documento'] ?></td>
                <td><?php echo $mostrar['nom_tipo_usuario'] ?></td>
                <td><?php echo $mostrar['Cod_Carnet'] ?></td>
                <td><?php echo $mostrar['Nombres'] ?></td>
                <td><?php echo $mostrar['Apellidos'] ?></td>
                <td><?php echo $mostrar['fecha_nacimiento'] ?></td>
                <td><?php echo $mostrar['genero'] ?></td>
                <td><?php echo $mostrar['correo_personal'] ?></td>
                <td><?php echo $mostrar['correo_sena'] ?></td>
                <td><?php echo $mostrar['telefono'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>


        <table class="matricula" style="margin: 50px;" border="1">
        <p style="margin : 50px;">Matricula</p>
            <tr>
                <td>Numero matricula</td>
                <td>Fecha Matricula</td>
                <td>Numero Ficha</td>
                <td>Nombre Formacion</td>
                <td>Ambiente</td>
                <td>Nombre Nave</td>
                <td>Jornada</td>
                <td>Tipo Usuario</td>
                <td>Documento</td>
                <td>Tipo Documento</td>
                <td>Nombres</td>
                <td>Apellidos</td>
            </tr>

            <?php
                 $sql="SELECT id_matricula,fecha_matricula,num_ficha,nom_formacion,ambiente.id_ambiente,nave.nom_nave,jornada.nom_jornada,tipo_usuario.nom_tipo_usuario,matricula.documento,nom_documento,Nombres,Apellidos 
                 FROM matricula,detalle_formacion,formacion,usuarios,tipo_documento,nave,ambiente,jornada,tipo_usuario
                 WHERE matricula.documento = usuarios.documento 
                 AND matricula.id_detalle_formacion = detalle_formacion.id_detalle_formacion 
                 AND detalle_formacion.id_formacion = formacion.id_formacion 
                 AND ambiente.id_nave = nave.id_nave 
                 AND detalle_formacion.id_ambiente = ambiente.id_ambiente
                 AND matricula.id_jornada = jornada.id_jornada
                 AND usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
                 AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
                 AND tipo_usuario.id_tipo_usuario = 2";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr>
                <td><?php echo $mostrar['id_matricula'] ?></td>
                <td><?php echo $mostrar['fecha_matricula'] ?></td>
                <td><?php echo $mostrar['num_ficha'] ?></td>
                <td><?php echo $mostrar['nom_formacion'] ?></td>
                <td><?php echo $mostrar['id_ambiente'] ?></td>
                <td><?php echo $mostrar['nom_nave'] ?></td>
                <td><?php echo $mostrar['nom_jornada'] ?></td>
                <td><?php echo $mostrar['nom_tipo_usuario'] ?></td>
                <td><?php echo $mostrar['documento'] ?></td>
                <td><?php echo $mostrar['nom_documento'] ?></td>
                <td><?php echo $mostrar['Nombres'] ?></td>
                <td><?php echo $mostrar['Apellidos'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
              





</body>
</html>