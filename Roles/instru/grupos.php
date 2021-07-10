<?php
    require_once ('../../includes/conexion.php');
?>
<?php
function consultar($consulta, $mysqli):mysqli_result
{
    return mysqli_query($mysqli, $consulta);    
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/asignacion.css">
    <title>Document</title>
</head>
<body>
    <h1>Formaciones</h1>
    <label for="select">Seleccione que lista de formacion quiere ver</label>
    <form action=""></form>
        <select name="ficha" id="ficha" required>
            <option value=""></option>
            <?php
            foreach (consultar("SELECT ficha FROM fichas WHERE instructor = 444", $mysqli) as $ficha) :  ?>
            <option value="<?php echo $ficha['ficha']?>"><?php echo $ficha['ficha']?></option>

            <?php
            endforeach;
            ?>
        </select>
    </form>


    <table id="mostrar_aprendices" class="tabla_busqueda">
        <thead>
            <tr>
                <th>Tipo de Documento</th>
                <th>Documento</th>
                <th>Cod Carnet</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Sena</th>
                <th>Telefono</th>
            </tr>
        </thead>
        <?php

            $consul="SELECT id_tipo_documento,documento,Cod_Carnet,Nombres,Apellidos,
            correo_sena,telefono from usuarios, matricula WHERE usuarios.documento=matricula.aprendiz AND ficha= '$ficha'";
            $ejecutar = mysqli_query($mysqli,$consul);

            while($mostrar=mysqli_fetch_array($ejecutar)){
        ?>
            <tr>
                <td><?php echo $mostrar['id_tipo_documento']?></td>
                <td><?php echo $mostrar['documento']?></td>
                <td><?php echo $mostrar['Cod_Carnet']?></td>
                <td><?php echo $mostrar['Apellidos']?></td>
                <td><?php echo $mostrar['Nombres']?></td>
                <td><?php echo $mostrar['correo_sena']?></td>
                <td><?php echo $mostrar['telefono']?></td>
            </tr>
        <?php
            }
        ?>
   </table>
</body>
</html>