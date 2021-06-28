<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceptacion</title>
    <link rel="stylesheet" href="pag_admin/css/aceptacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
</head>
<body>

<?php

include('../../includes/conexion.php');

    $consulta1 = "SELECT usuarios.documento, usuarios.Nombres, usuarios.Apellidos, fichas.ficha,formacion.nom_formacion, jornada.nom_jornada, nave.nom_nave, ambiente.n_ambiente,matricula.fecha_matricula, fichas.instructor, aceptacion_usuarios.id_estado_aprobacion,id_matricula
    FROM usuarios, fichas, formacion, jornada, nave, ambiente, matricula, aceptacion_usuarios
    WHERE usuarios.documento=matricula.aprendiz 
    AND fichas.ficha=matricula.ficha 
    AND formacion.id_formacion=fichas.id_formacion
    AND jornada.id_jornada=fichas.id_jornada
    AND nave.id_nave=ambiente.id_nave
    AND ambiente.id_ambiente=fichas.id_ambiente
    AND usuarios.documento=aceptacion_usuarios.documento
    AND id_estado_aprobacion=2";

?>

<div class="head">

<a href="admin.php"><i class="atras fas fa-arrow-left"></i></a>

<h2>ACEPTACIÓN DE APRENDICES</h2>
</div>

<form action="procesaraceptar.php" method="POST">

<table>

<tr>
    <th>Aprendiz</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Ficha</th>
    <th>Formacion</th>
    <th>Jornada</th>
    <th>Nave</th>
    <th>Ambiente</th>
    <th>Fecha Matricula</th>
    <th>Instructor</th>
    <th>ACEPTAR</th>
</tr>

<?php

$ejecu = mysqli_query($mysqli,$consulta1);
while($i = mysqli_fetch_array($ejecu)){

?>
<tr>
    <input type="hidden" name="<?php echo $i['documento']?>" value="<?php echo $i['documento']?>">
    <td><?php echo $i['documento'] ?></td>
    <td><?php echo $i['Nombres'] ?></td>
    <td><?php echo $i['Apellidos'] ?></td>
    <td><?php echo $i['ficha'] ?></td>
    <td><?php echo $i['nom_formacion'] ?></td>
    <td><?php echo $i['nom_jornada'] ?></td>
    <td><?php echo $i['nom_nave'] ?></td>
    <td><?php echo $i['n_ambiente'] ?></td>
    <td><?php echo $i['fecha_matricula'] ?></td>
    <td><?php echo $i['instructor'] ?></td>
    <td><input type="checkbox" name="<?php echo $i['id_matricula']?>" id=""></td>
</tr>



<?php
}
?>
</table>
<input type="submit" value="ACEPTAR" name="enviar" class="boto">

</form>

</body>
</html>


    



