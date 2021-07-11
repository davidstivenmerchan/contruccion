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
            <div class="hijo22"> <p>MES ESPECIFICO</p></div>
            <div class="formu">
                <form action="../../reportes/asistencia_especifica.php" method="POST">
                        <label for="mes">Seleccione el Mes</label>
                        <select name="mes" id="mes">
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
                        <input type="number" id="año" name="año">
                        <input type="submit" value="Buscar Asistencias">

                        
                    </form>
            </div>
                
            </div>
        </div>
    
</body>
</html>