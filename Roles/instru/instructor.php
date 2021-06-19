<?php
  require_once ('../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/instructor.css">
    
    <title>Instructor</title>
</head>
<body>
   <h1>Instructor</h1>
   <nav>
        <ul>
            <li><a href="asignacion_equipos.php">Asignación de Computadores</a></li>
            <li><a href="asistencia_aprendices.php">Asistencia de Aprendices</a></li>
            <li><a href="registrar_equipos.php">Equipos de Computo</a></li>
            <li>mmsss</li>
        </ul>
   </nav>

   
    <!-- <div class="menu">
        <img src="../img/logo.sena.png" alt="">
        <h1>INSTRUCTOR</h1>
        <P>Menu</P>
        <input type="button" value="Aprendices">
        <input type="button" value="Equipos">
        <a href="../index.html"><input type="button" value="Cerrar Sesion"></a>

    </div>
    <div class="asignar">
        <form action="../includes/asignar.php" method="POST" autocomplete="off">
            <label for="doc">Documento</label>
            <input type="number" name="doc" placeholder="Digite el numero de documento del aprendiz">
            <button name="boton">Consultar</button>
        </form>
    </div>
    <div class="tabla" id="tabla"> 
        <table>
            <tr>
                <td>Nombre</td>
                <td>Equipo</td>
                <td>Inicio</td>
                <td>Finalizo</td>
                <td>Estado</td>
            </tr>
            <?php
           // $sql="SELECT nombre_completo, asignacion.serial, feho_ini, feho_fin, nom_estado FROM asignacion, usuarios,estado,equipos WHERE usuarios.documento = asignacion.documento AND estado.id_estado = equipos.id_estado";
            //$resul=mysqli_query($mysqli,$sql);

            //while($mostrar=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php //echo $mostrar['nombre_completo']?></td>
                    <td><?php //echo $mostrar['serial']?></td>
                    <td><?php //echo $mostrar['feho_ini']?></td>
                    <td><?php //echo $mostrar['feho_fin']?></td>
                    <td><?php //echo $mostrar['nom_estado']?></td>
                </tr>
            <?php
                // }
            ?>
        </table>
    </div> -->
</body>
</html>