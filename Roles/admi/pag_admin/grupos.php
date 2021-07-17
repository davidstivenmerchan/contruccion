<?php
    include('../../../includes/conexion.php');

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
    <title>Document</title>
    <link rel="stylesheet" href="pag_admin/css/tabla_de_grupos.css">
</head>
<body>

<h1>Grupos</h1>
    <label for="select">Seleccione que lista de formacion quiere ver</label>
    <form action=""></form>
        <select name="ficha" id="ficha" required>
        <option value="">Seleccione una ficha</option>
        
        

        <?php
            foreach (consultar("SELECT ficha FROM fichas", $mysqli) as $ficha) :  ?>
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
        <tbody id="mostrar_aprendices2">

        </tbody>
   </table>
</body>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="../Roles/js/grupos_admin.js"></script>
</body>
</html>