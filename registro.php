<?php
     require_once 'includes/conexion.php';
?>
<?php
     $consul= "SELECT * FROM tipo_documento";
     $query= mysqli_query($mysqli,$consul);
     $respu= mysqli_fetch_assoc($query); 

     $consul1= "SELECT * FROM genero";
     $query1= mysqli_query($mysqli,$consul1);
     $respu1= mysqli_fetch_assoc($query1); 

     $consul2= "SELECT * FROM fichas ";
     $query2= mysqli_query($mysqli,$consul2);
     $respu2= mysqli_fetch_assoc($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de APRENDICES</title>
    <link rel="stylesheet" href="css/resgistrousuarios.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
</head>
<body>
<div class="papadepapa">
<div class="papa">
    <h1>REGISTRO DE APRENDICES</h1>
    <form action="registrousuarios/registro_usu.php" method="POST" autocomplete="off" id="formulario">
    <div>
        <input type="number" name="cc" placeholder="Ingrese numero de documento" id="cedula">
        <i id ="ccm" class="cancelcedula fas fa-times-circle"></i>
        <i id ="ccb" class="correccedula fas fa-check-circle"></i>
        
        <select name="tip_doc" id="tip_doc" required>
                    <option value="">Tipo de Documento</option>
                    <?php
                        foreach ($query as $tipo_doc) :  ?>
                        <option value="<?php echo $tipo_doc['id_tipo_documento']?>"><?php echo $tipo_doc['nom_documento']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
        <input type="number" name="cod_carnet" id="carnet" placeholder="Ingrese su numero de carnet">
        <i id ="codm" class="cancelcarnet fas fa-times-circle"></i>
        <i id ="codb" class="correccarnet fas fa-check-circle"></i>
        
    </div>
    <div>
        <input type="text" name="nom" id="" placeholder="Ingrese sus nombres">
        <i id ="nomm" class="cancelnom fas fa-times-circle"></i>
        <i id ="nomb" class="correcnom  fas fa-check-circle"></i>
        <input type="text" name="ape" id="" placeholder="Ingrese sus apellidos">
        <i id ="apem" class="cancelape fas fa-times-circle"></i>
        <i id ="apeb" class="correcape  fas fa-check-circle"></i>
        <input type="number" name="tell" id="" placeholder="Ingrese su telefono">
        <i id ="telm" class="canceltel fas fa-times-circle"></i>
        <i id ="telb" class="correctel  fas fa-check-circle"></i>
        
        
    </div>
    <div>
        <input type="text" name="correo_s" id="" placeholder="Ingrese su correo sena">
        <i id ="cosm" class="cancelcos fas fa-times-circle"></i>
        <i id ="cosb" class="correccos fas fa-check-circle"></i>
        <input type="text" name="correo_p" id="" placeholder="Ingrese su correo personal">
        <i id ="copm" class="cancelcop fas fa-times-circle"></i>
        <i id ="copb" class="correccop fas fa-check-circle"></i>
        <select name="genero" id="tip_usu" required>
                    <option value="">Seleccione su genero </option>
                    <?php
                        foreach ($query1 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_genero']?>"><?php echo $tipo_usu['nom_genero']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
        
    </div>

    <div class="sele1">
    
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
        <i id ="pasm" class="cancelpas fas fa-times-circle"></i>
        <i id ="pasb" class="correcpas fas fa-check-circle"></i>
        
        <input type="password" name="password2" id="password2" placeholder="Confirme su contraseña">
        <i id ="pas2m" class="cancelpas2 fas fa-times-circle"></i>
        <i id ="pas2b" class="correcpas2 fas fa-check-circle"></i>
        
    </div>
    <div class="sele2"> 
        <label>Fecha de Nacimiento </label>
        <input type="date" name="date" id="">
        <label for="">Fecha de Matricula</label>
        <input type="date" name="date_matricula" id="date_matricula">
    </div>   
    <div class="sele5">
        <select name="ficha" id="ficha" required>
                    <option value="">Seleccione Su Ficha</option>
                    <?php
                        foreach ($query2 as $ficha) :  ?>
                        <option value="<?php echo $ficha['ficha']?>"><?php echo $ficha['ficha']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
    </div>
    <div class="sele4">
        <input type="submit" value="REGISTRAR" name="enviar">
    </div>
    <div class="bloqueo" id="bloqueo">
        <p>¡Llene Todos Los Campos!</p>
    </div>
        <!-- hola -->
    </form>   
    </div> 
</div>
<div class="mensaje" id="mensaje">
    <p>la cedula y el codigo de carnet tiene que ser iguales</p>
</div>
<div class="mensaje2" id="mensaje2">
    <p>solo puede ingresar numeros, minimo 7 maximo 14</p>
</div>
<div class="mensaje3" id="mensaje3">
    <p>solo puede ingresar letras, minimo 3 letras y maximo 40</p>
</div>
<div class="mensaje4" id="mensaje4">
    <p>solo puede ingresar letras, minimo 3 letras y maximo 40</p>
</div>
<div class="mensaje5" id="mensaje5">
    <p>solo puede ingresar numeros, minimo 7 maximo 14</p>
</div>
<div class="mensaje6" id="mensaje6">
    <p>necesita tener una direccion de correo</p>
</div>
<div class="mensaje7" id="mensaje7">
    <p>necesita tener una direccion de correo</p>
</div>
<div class="mensaje8" id="mensaje8">
    <p>necesita tener minimo 6 maximo 12 caracteres</p>
</div>
<div class="mensaje9" id="mensaje9">
    <p>las contraseñas necesitan ser iguales</p>
</div>
<div class="ico">
    <a href="index.html"><i class="icono fas fa-sign-out-alt"></i></a>
</div>

<script src="registrousuarios/validacion.js"></script>

</body>
</html>