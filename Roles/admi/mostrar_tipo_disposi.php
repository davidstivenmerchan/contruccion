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


</body>
</html>