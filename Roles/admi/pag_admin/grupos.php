<?php
    include('../../../includes/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/mostrar_tablas.css">
</head>
<body>



        <table class="tablamatri">
        <p style="margin : 50px;">Matricula</p>
            <tr class="titulo">
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


            <tr class="datos">
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
        
        </table>

</body>
</html>