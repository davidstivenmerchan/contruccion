<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/equipos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Equipos</title>
</head>
<body>
<a href="instructor.php"> <i class="atras fas fa-arrow-left"></i></a> 

<h1>EQUIPOS DE COMPUTO</h1>
 
<nav>
    <ul>
        <li onclick="parte1()"><strong>DISPONIBILIDAD DE LOS EQUIPOS</strong></li>
        <li onclick="parte2()"><strong>ESTADO DE LOS EQUIPOS</strong></li>
    </ul>
</nav>

<div id="disponibilidad">
  <h2><strong>Disponibilidad de los Equipos</strong></h2>

  <table>
      <thead>
          <tr>
            <th>Serial</th>
            <th>Placa Sena</th>
            <th>Tipo de Dispositivo</th>
            <th>Nombre Dispositivo</th>
            <th>Marca</th>
            <th>Estado Disponibilidad</th>
            <th>Operacion</th>
            
          </tr>
      </thead>
      <tbody id="tabladisponiblidad">

      </tbody>
  </table>
</div>


<div id="estado">
<h2><strong>Estado de los Equipos</strong></h2>
<table>
      <thead>
          <tr>
            <th>Serial</th>
            <th>Placa Sena</th>
            <th>Tipo de Dispositivo</th>
            <th>Nombre Dispositivo</th>
            <th>Marca</th>
            <th>Estado Dispositivo</th>
            <th>Operacion</th>
          </tr>
      </thead>
      <tbody id="estadodispositivo">
      </tbody>
  </table>



</div>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="js/equipos.js"></script>
</body>
</html>
