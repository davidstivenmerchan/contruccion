<?php
     require_once('../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/instructor.css">
    <title>Asistencia</title>
</head>
<body>
    <h1>Asistencia de Aprendices</h1>
    
    <table id="tabla_asistencia" class="tabla_busqueda">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <?php
            $sql="SELECT  usuarios.documento, usuarios.Apellidos, usuarios.Nombres,
            fecha, hora FROM usuarios, entrada_aprendiz WHERE usuarios.documento = entrada_aprendiz.documento ";
            $resul=mysqli_query($mysqli,$sql);

            while($mostrar=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php echo $mostrar['documento']?></td>
                    <td><?php echo $mostrar['Apellidos']?></td>
                    <td><?php echo $mostrar['Nombres']?></td>
                    <td><?php echo $mostrar['fecha']?></td>
                    <td><?php echo $mostrar['hora']?></td>
                </tr>
            <?php
                }
            ?>
    </table>
</body>
</html>