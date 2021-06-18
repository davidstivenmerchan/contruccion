<?php
$fechaHoy = date("Y-m-d");
$horaHoy = date("H:i:s"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion Equipos</title>
    <link rel="stylesheet" href="./css/instructor.css">
</head>
<body>
    <h1>ASIGNACIÓN DE EQUIPOS DE COMPUTO</h1>
    
    
    <form action="">
            <label for="buscar_con_cedula">Ingrese la Cedula del Aprendiz para Buscar</label>
            <input type="number" name="" id="buscar_con_cedula">

            
    </form>
    
    
    <table id="buscar_asignacion_equipos">
        <thead>
            <tr>
                <td>Documento</td>
                <td>Equipo por Serial</td>
                <td>fecha</td>
                <td>Descripcion Inicial</td>
                <td>Hora Inicial</td>
                <td>Descripcion Final</td>
                <td>Hora Final</td>
            </tr>
        </thead>
        <tbody id="tabla_asignacion_equipos">
            
        </tbody>
   </table>
   <br>
    <br>

   <form action=""  id="insertar_asignacion">
            <label for="ce">Por favor Ingrese la Cedula del Aprendiz</label>
            <input type="number" name="" id="ce">
            <input type="hidden" id="fecha" value="<?php echo $fechaHoy ?>">
            <input type="hidden" id="hora" value="<?php echo $horaHoy ?>">
            <button>
            asignar equipo
            </button>
        </form>
    
   <table>
        <thead>
            <tr>
                <td>Documento</td>
                <td>Equipo por Serial</td>
                <td>fecha</td>
                <td>Descripcion Inicial</td>
                <td>Hora Inicial</td>
                <td>Descripcion Final</td>
                <td>Hora Final</td>
            </tr>
        </thead>
        <tbody id="tabla_asignacion_equipos_toda">
            
        </tbody>
   
   </table>

  


    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="js/app.js"></script>

</body>
</html>