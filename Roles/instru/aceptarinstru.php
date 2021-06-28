<?php

require_once('../../includes/conexion.php');
$ccc = $_GET['var'];

$consulta1= "SELECT aceptacion_usuarios.id_aceptacion, usuarios.documento, usuarios.Nombres, usuarios.Apellidos, fichas.ficha, formacion.nom_formacion, jornada.nom_jornada, nave.nom_nave, ambiente.n_ambiente, matricula.fecha_matricula, aceptacion_usuarios.id_estado_aprobacion
FROM usuarios, fichas, formacion, jornada, nave, ambiente, matricula, aceptacion_usuarios
WHERE usuarios.documento=matricula.aprendiz
AND fichas.ficha=matricula.ficha
AND formacion.id_formacion=fichas.id_formacion
AND jornada.id_jornada=fichas.id_jornada
AND nave.id_nave=ambiente.id_nave
AND ambiente.id_ambiente=fichas.id_ambiente
AND usuarios.documento=aceptacion_usuarios.documento
AND fichas.instructor='$ccc'
AND aceptacion_usuarios.id_estado_aprobacion=2";
$ejecucion1=mysqli_query($mysqli, $consulta1);







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACEPTAR APRENDICES</title>
    <link rel="stylesheet" href="css/aprobacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
</head>

<form action="procesaraceptacioninstru.php" method="POST">
<body>

<a href="instructor.php"><i class="atras fas fa-arrow-left"></i></a>
<h1>Aceptar Aprendices</h1>




<table>
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Ficha</th>
            <th>Formacion</th>
            <th>Jornada</th>
            <th>Nave</th>
            <th>Ambiente</th>
            <th>Fecha Matricula</th>
            <th>ACEPTAR</th>
        </tr>
    </thead>

    <?php
    while($i = mysqli_fetch_array($ejecucion1)){
    
    ?>
    
    <tbody>
        <tr>
            <input type="hidden" value="<?php echo $i['documento'] ?>" name="<?php echo $i['documento'] ?>">
            <td><?php echo $i['documento'] ?></td>
            <td><?php echo $i['Nombres'] ?></td>
            <td><?php echo $i['Apellidos'] ?></td>
            <td><?php echo $i['ficha'] ?></td>
            <td><?php echo $i['nom_formacion'] ?></td>
            <td><?php echo $i['nom_jornada'] ?></td>
            <td><?php echo $i['nom_nave'] ?></td>
            <td><?php echo $i['n_ambiente'] ?></td>
            <td><?php echo $i['fecha_matricula'] ?></td>
            <td><input type="checkbox" name="<?php echo $i['id_aceptacion'] ?>" id=""></td>
            
            
        </tr>
    </tbody>
   
    <?php
    }
    
    ?>
   
</table>
<!-- <input type="hidden" value="22" name="nombre">
<td><input type="checkbox" name="prueba" id=""></td> -->
<input type="submit" name="enviar" id="" value="ACEPTAR" class="boto">
    </form>

    
</body>
</html>