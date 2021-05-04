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

        <table border="1">
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


</body>
</html>