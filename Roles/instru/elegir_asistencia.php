<?php
$dia = date('d');
$mes =date('m');
$año =date('Y');

$fecha = "$año-$mes-04";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/elegir_asistencia.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Reportes</title>

</head>
<body>
<div class="titulo">
    <img src="../../assets/logo_sl.png" alt="">
    <h1>INFORMES DE ASISTENCIA</h1>
</div>
    <div class="padre">
        <div class="hijo1">
           <a href="../../reportes/asistencia.php"><div class="hijo11"><p>MES ACTUAL</p></div></a> 
        </div>
        <div class="hijo2">
       
            <div class="hijo22" onclick="mostrar();"> <p>MES ESPECIFICO</p></div>
            <div class="formu" id="formulario">
            <i class="far fa-times-circle" onclick="desaparecer();"></i>
                <form action="../../reportes/asistencia_especifica.php" method="POST">
                        <label for="mes">Seleccione el Mes</label>
                        <select name="mes" id="mes" class="campos">
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">junio</option>
                            <option value="07">julio</option>
                            <option value="08">agosto</option>
                            <option value="09">septiembre</option>
                            <option value="10">octubre</option>
                        </select>
                        <br>
                        <label for="año">Ingrese el Año</label>
                        <input type="number" id="año" name="año" class="campos">
                        <input type="submit" value="Buscar Asistencias" class="enviar">

                        
                    </form>
            </div>
                
            </div>
        </div>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="js/asistencia.js"></script>
    
</body>
</html>