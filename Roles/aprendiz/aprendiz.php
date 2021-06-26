<?php
    require_once("../../includes/validacion.php");
    include('../../includes/conexion.php');


    $nombre = $_SESSION['nombre'];
    $documento = $_SESSION['cc'];
    $cod_carnet = $_SESSION['cod_carnet'];
    $apellido = $_SESSION['apellido'];
    $fecha =$_SESSION['fecha'];
    $genero =$_SESSION['genero'];
    $correo_p =$_SESSION['correo_p'];
    $correo_s=$_SESSION['correo_s'];
    $tel=$_SESSION['tel'];
    

    $consulta1 = "SELECT entrada_aprendiz.documento, asignacion_equipos.id_equipo, equipos.serial 
    FROM entrada_aprendiz, asignacion_equipos, equipos  
    WHERE entrada_aprendiz.id_entrada_aprendiz=asignacion_equipos.id_entrada_aprendiz 
    AND equipos.id_equipo=asignacion_equipos.id_equipo 
    AND documento = '$documento'";

    $ejecucion1 = mysqli_query($mysqli, $consulta1);
    $mostrar1 = mysqli_fetch_array($ejecucion1);
    if($mostrar1){
        $serial = $mostrar1['serial'];
    }

    $consulta2 = "SELECT asignacion_equipos.id_asignacion_equipos, entrada_aprendiz.documento 
    from asignacion_equipos, entrada_aprendiz
    where entrada_aprendiz.id_entrada_aprendiz = asignacion_equipos.id_entrada_aprendiz
    and entrada_aprendiz.documento='$documento'";
    $ejecucion2 = mysqli_query($mysqli, $consulta2);
    $mostrar2 = mysqli_fetch_array($ejecucion2);
    if($ejecucion2){
        $id_asignacion = $mostrar2['id_asignacion_equipos'];
    }

    $consulta3 = "SELECT  matricula.id_matricula, matricula.fecha_matricula, detalle_formacion.num_ficha, formacion.nom_formacion, 
    ambiente.nom_ambiente, nave.nom_nave, jornada.nom_jornada FROM matricula, detalle_formacion, formacion, ambiente, nave, jornada
    where detalle_formacion.id_detalle_formacion=matricula.id_detalle_formacion 
    AND jornada.id_jornada=matricula.id_jornada
    AND formacion.id_formacion=detalle_formacion.id_formacion
    AND ambiente.id_ambiente=detalle_formacion.id_ambiente
    AND nave.id_nave=ambiente.id_nave
    AND matricula.documento='$documento'";
    $ejecucion3=mysqli_query($mysqli,$consulta3);
    $mostrar3=mysqli_fetch_array($ejecucion3);
    if($mostrar3){
        $id_matricula = $mostrar3['id_matricula'];
        $fecha_matricula = $mostrar3['fecha_matricula'];
        $num_ficha = $mostrar3['num_ficha'];
        $nom_formacion = $mostrar3['nom_formacion'];
        $nom_ambiente = $mostrar3['nom_ambiente'];
        $nom_nave = $mostrar3['nom_nave'];
        $nom_jornada = $mostrar3['nom_jornada'];
    }

    $consulta4="SELECT asignacion_equipos.descripcion_inicial, asignacion_equipos.descripcion_final, entrada_aprendiz.documento
    FROM asignacion_equipos, entrada_aprendiz where asignacion_equipos.id_entrada_aprendiz=entrada_aprendiz.id_entrada_aprendiz
    AND entrada_aprendiz.documento='$documento'";
    $ejecucion4=mysqli_query($mysqli,$consulta4);
    $mostrar4=mysqli_fetch_array($ejecucion4);
    if($mostrar4){
        $m_inicial = $mostrar4['descripcion_inicial'];
        $m_final = $mostrar4['descripcion_final'];
    }

    $consulta5 = "SELECT dispositivo_electronico.serial, dispositivo_electronico.placa_sena, 
    dispositivo_electronico.nom_dispositivo, marca.nom_marca, tipo_dispositivo.nom_tipo_dispositivo
    FROM dispositivo_electronico, marca, tipo_dispositivo
    WHERE marca.id_marca=dispositivo_electronico.id_marca 
    and tipo_dispositivo.id_tipo_dispositivo=dispositivo_electronico.id_tipo_dispositivo
    and serial ='$serial'";
    $ejecucion5 = mysqli_query($mysqli, $consulta5);
    $mostrar5 = mysqli_fetch_array($ejecucion5);
    if($mostrar5){
        $idserial = $mostrar5['serial'];
        $placa = $mostrar5['placa_sena'];
        $nom_dispositivo = $mostrar5['nom_dispositivo'];
        $marca = $mostrar5['nom_marca'];
        $tipodis = $mostrar5['nom_tipo_dispositivo'];

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/aprendiz.css">
    <link rel="stylesheet" href="css/appbar.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Aprendiz</title>
</head>
<body>
    <form action="">
        <input type="hidden" value="<?php echo $m_inicial ?>" id="prueba34">
        <input type="hidden" value="<?php echo $m_final ?>" id="prueba35">
    </form>
<header class="header">
        <figure>
            <img src="../../assets/logo_solo.png" alt="logo construccion" title="logo software">
        </figure>
        <nav>
            <a href="#">Mis Datos</a>
            <a href="#">Mi Computador</a>
        </nav>
        <article class="opciones">
            <a href="../../includes/cerrar.php"><i class="fas fa-door-open"></i></a>
            <p>Aprendiz</p>
        </article>
    </header>
    <h2>MIS DATOS</h2>
    <div class="papa2">
        <div class="mis_datos">
            <h3>PERSONALES</h3>
            <p>Documento: <?php echo  $documento ?></p>
            <p>Cod Carnet: <?php echo  $cod_carnet ?></p>
            <p>Nombres: <?php echo  $nombre ?></p>
            <p>Apellidos: <?php echo  $apellido ?></p>
            <p>Fecha de Nacimiento: <?php echo  $fecha ?></p>
            <p>Correo Personal: <?php echo  $correo_p ?> </p>
            <p>Correo misena: <?php echo  $correo_s ?></p>
            <p>Telefono: <?php echo  $tel ?></p>
        </div>
        <div class="mis_datos">
            <h3>MI MATRICULA</h3>
            <p>N° Matricula: <?php echo  $id_matricula ?></p>
            <p>Fecha Matricula: <?php echo  $fecha_matricula ?></p>
            <p>N° de Ficha: <?php echo  $num_ficha ?></p>
            <p>Formacion: <?php echo  $nom_formacion ?></p>
            <p>Ambiente: <?php echo  $nom_ambiente ?></p>
            <p>N° Nave: <?php echo  $nom_nave ?> </p>
            <p>Jornada: <?php echo  $nom_jornada ?></p>
        </div>
        <div class="mis_datos">
            <h3>MI COMPUTADOR</h3>
            <p>Serial: <?php echo  $idserial ?></p>
            <p>Placa Sena: <?php echo  $placa ?></p>
            <p>Dispositivo: <?php echo  $nom_dispositivo ?></p>
            <p>Marca: <?php echo  $marca ?></p>
            <p>Tipo de Dispositivo: <?php echo  $tipodis ?></p>

        </div>
    </div>
<hr>
    <h2>MI COMPUTADOR</h2>

    <p class="texto">Mi Equipo de Computo Asignado es: <?php echo $serial ?> </p> 
    <div class="bloqueo" id="bloqueo"><p>Estado Final</p></div>
    <div class="bloqueo2" id="bloqueo2"><p>Estado Inicial</p></div>
<div class="padre">

    <div>
        <button id="botoninicial"  class="botoninicial" onclick="alerta()">
            Estado Inicial
        </button>
        <form action="js_aprendiz/agregarmensaje.php" id="formularioinicio" class="formuu" method="POST">
            <textarea name="mensajeinicio" id="mensajeinicio" cols="30" rows="10" max=30 min=30 placeholder="Describa en que Estado Encontro su Equipo de Computo"></textarea>
            <input type="hidden" value="<?php echo $id_asignacion ?>" id="id_asignacion_inicio" name="id_asignacion_inicio">
            <button id="enviarinicial" name="enviarinicial">
                Enviar Estado de Equipo
            </button>
            
        </form>
            <button class="cerrar" id="cerrar" onclick="cerrar()">
                Cerrar Este Formulario
            </button>
    </div>
    <div>
        <button class="botoninicial boton2" onclick="alerta2()">
            Estado Final
        </button>
        <form action="js_aprendiz/agregarfinal.php" id="formularioinicioo" class="formuu" method="POST">
            <textarea name="mensajefinal" id="mensajefinal" cols="30" rows="10" max=30 min=30 placeholder="Describa en que Estado Dejo su Equipo de Computo"></textarea>
            <input type="hidden" value="<?php echo $id_asignacion ?>" id="id_asignacion_inicioo" name="id_asignacion_inicioo">
            <button name="enviarfinal">
                Enviar Estado de Equipo
            </button>
            
        </form>
            <button class="cerrar2" id="cerrarr" onclick="cerrarr()">
                Cerrar Este Formulario
            </button>
    </div>
</div>

    <p id="mensajefinalll" >USTED HA ENVIADO CORRECTAMENTE LOS DOS ESTADOS DE SU EQUIPO DE COMPUTO</p>
    
   
<br>
<br>
<br>
<br>
<br>
<br>
    

    
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>

    <script src="js_aprendiz/aprendiz.js"></script>
</body>
</html>