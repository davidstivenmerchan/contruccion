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


</body>
</html>