<?php 
require_once("../../includes/conexion.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tablas.css">
    <title>Tablas</title>
</head>

<body>
    <div class="tablas">
    <center>
    <div class="marca">
            <h2>Marcas</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Marca</td>

                </tr>
                <?php 
            $con = "SELECT * from marca";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_marca']?></td>
                    <td><?php echo $eh['nom_marca']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="marca">
            <h2>Jornadas</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Jornada</td>

                </tr>
                <?php 
            $con = "SELECT * from jornada";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_jornada']?></td>
                    <td><?php echo $eh['nom_jornada']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="marca">
            <h2>Formaciones</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Formacion</td>

                </tr>
                <?php 
            $con = "SELECT * from formacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_formacion']?></td>
                    <td><?php echo $eh['nom_formacion']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="marca">
            <h2>Estados de aprobacion</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>

                </tr>
                <?php 
            $con = "SELECT * from estado_aprobacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_estado_aprobacion']?></td>
                    <td><?php echo $eh['nom_aprobacion']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
     
        <div class="marca">
            <h2>Estados de los dispositivos</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>

                </tr>
                <?php 
            $con = "SELECT * from estado_dispositivo";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_estado_dispositivo']?></td>
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        
        <div class="marca">
            <h2>Estados de disponibilidad</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>

                </tr>
                <?php 
            $con = "SELECT * from estado_disponibilidad";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_estado_disponibilidad']?></td>
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="marca">
            <h2>Ambientes</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Id nave</td>

                </tr>
                <?php 
            $con = "SELECT * from ambiente";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr>
                    <td><?php echo $eh['id_ambiente']?></td>
                    <td><?php echo $eh['id_nave']?></td>

                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        
    </center>
        


    </div>



</body>

</html>