<?php
$fechaHoy = date("Y-m-d");
$horaHoy = date("H:i:s"); 


$ccc = $_GET['var'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignacion Equipos</title>
    <link rel="stylesheet" href="./css/asignacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
</head>
<body>
    <h1>ASIGNACIÓN DE EQUIPOS DE COMPUTO</h1>

    <i class="buscar fas fa-search"></i>
    <a href="instructor.php"> <i class="atras fas fa-arrow-left"></i></a> 
     <br>
    
    <form action="" class="buscar_asignacion">
            <label for="buscar_con_cedula"><strong> Ingrese la Cedula del Aprendiz para Buscar :</strong></label>
            <input type="number" name="" id="buscar_con_cedula" class="inputbuscarasignacion">     
    </form>
    
    <h2 id="mensajenegativo">NO EXISTEN VALORES CON ESE DOCUMENTO!</h2>
    
    <table id="buscar_asignacion_equipos" class="tabla_busqueda">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Equipo por Serial</th>
                <th>fecha</th>
                <th>Descripcion Inicial</th>
                <th>Hora Inicial</th>
                <th>Descripcion Final</th>
                <th>Hora Final</th>
            </tr>
        </thead>
        <tbody id="tabla_asignacion_equipos">
            
        </tbody>
   </table>
   <br>
    <br>

   <form action="js/agregar_asignacion.php" class="buscar_asignacion" method="POST">
            <label for="ce"><strong>Por favor Ingrese la Cedula del Aprendiz: </strong></label>
            <input type="number" name="cedula" id="ce" class="inputbuscarasignacion">
            <input type="hidden" id="fecha" name="fecha" value="<?php echo $fechaHoy ?>">
            <input type="hidden" id="hora" name="hora" value="<?php echo $horaHoy ?>">
            <input type="hidden" id="docuinstru" name="docuinstru" value="<?php echo $ccc ?>">
            <input type="submit" class="enviarasignacion" value="Asignar equipo" name="enviar">
            <!-- <button class="enviarasignacion">
            asignar equipo
            </button> -->
        </form>
    
   <table class="tabla_busqueda grande">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Equipo por Serial</th>
                <th>fecha</th>
                <th>Descripcion Inicial</th>
                <th>Hora Inicial</th>
                <th>Descripcion Final</th>
                <th>Hora Final</th>
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

</body>
</html>