<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceptacion</title>
    <link rel="stylesheet" href="pag_admin/css/aceptacion.css">
</head>
<body>




<?php

include('../../includes/conexion.php');


$consulta1 = "SELECT id_matricula,fecha_matricula,num_ficha,nom_formacion,ambiente.id_ambiente,nave.nom_nave,
jornada.nom_jornada,tipo_usuario.nom_tipo_usuario,matricula.documento,nom_documento,Nombres,Apellidos,nom_aprobacion
FROM matricula,detalle_formacion,formacion,usuarios,tipo_documento,nave,ambiente,jornada,tipo_usuario,aceptacion_usuarios,estado_aprobacion
WHERE matricula.documento = usuarios.documento 
AND matricula.id_detalle_formacion = detalle_formacion.id_detalle_formacion 
AND detalle_formacion.id_formacion = formacion.id_formacion 
AND ambiente.id_nave = nave.id_nave 
AND detalle_formacion.id_ambiente = ambiente.id_ambiente
AND matricula.id_jornada = jornada.id_jornada
AND usuarios.id_tipo_documento = tipo_documento.id_tipo_documento
AND usuarios.id_tipo_usuario = tipo_usuario.id_tipo_usuario
AND aceptacion_usuarios.documento = usuarios.documento
AND aceptacion_usuarios.id_estado_aprobacion= estado_aprobacion.id_estado_aprobacion
AND tipo_usuario.id_tipo_usuario =  2
AND estado_aprobacion.id_estado_aprobacion = 2";




?>



    

<form action="procesaraceptar.php" method="POST">

<table>

<tr>
    <th>°N Matricula</th>
    <th>Fecha de Matricula</th>
    <th>°N de Ficha</th>
    <th>Formacion</th>
    <th>°N Ambiente</th>
    <th>Nave</th>
    <th>Jornada</th>
    <th>Documento</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>ACEPTAR</th>
</tr>

<?php

$ejecu = mysqli_query($mysqli,$consulta1);
while($i = mysqli_fetch_array($ejecu)){


?>



<tr>
<input type="hidden" name="<?php echo $i['documento']?>" value="<?php echo $i['documento']?>">
<td><?php echo $i['id_matricula'] ?></td>
<td><?php echo $i['fecha_matricula'] ?></td>
<td><?php echo $i['num_ficha'] ?></td>
<td><?php echo $i['nom_formacion'] ?></td>
<td><?php echo $i['id_ambiente'] ?></td>
<td><?php echo $i['nom_nave'] ?></td>
<td><?php echo $i['nom_jornada'] ?></td>
<td><?php echo $i['documento'] ?></td>
<td><?php echo $i['Nombres'] ?></td>
<td><?php echo $i['Apellidos'] ?></td>
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


    



