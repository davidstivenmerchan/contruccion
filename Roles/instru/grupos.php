<?php
    require_once ('../../includes/conexion.php');
    $cedula_instru = $_GET['var'];
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Formaciones</h1>
    <a href="instructor.php"> <i class="atras fas fa-arrow-left"></i></a> 
    <label for="select" class="grupo_label">Seleccione que lista de formacion quiere ver</label>
    <form action=""></form>
        <select class="grupo_select" name="ficha" id="ficha" required onchange="select();">
        <option value="">Seleccione una ficha</option>
        
        

        <?php
            foreach (consultar("SELECT ficha FROM fichas WHERE instructor = $cedula_instru", $mysqli) as $ficha) :  ?>
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
  <script src="js/grupos.js"></script>

 
</html>