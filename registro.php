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
    <form action="registrousuarios/registro_usu.php" method="POST">
    <div>
        <input type="number" name="cc" id="" placeholder="Ingrese numero de documento">
        <select name="tip_doc" id="tip_doc" required>
                    <option value="">Tipo de Documento</option>
                    <?php
                        foreach ($query as $tipo_doc) :  ?>
                        <option value="<?php echo $tipo_doc['id_tipo_documento']?>"><?php echo $tipo_doc['nom_documento']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
        <input type="number" name="cod_carnet" id="" placeholder="Ingrese su numero de carnet">
        
    </div>
    <div>
        <input type="text" name="nom" id="" placeholder="Ingrese sus nombres">
        <input type="text" name="ape" id="" placeholder="Ingrese sus apellidos">
        <input type="number" name="tell" id="" placeholder="Ingrese su telefono">
        
        
    </div>
    <div>
        <input type="text" name="correo_s" id="" placeholder="Ingrese su correo sena">
        <input type="text" name="correo_p" id="" placeholder="Ingrese su correo personal">
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
    
        <input type="password" name="password" id="" placeholder="Ingrese su contraseña">
        <input type="password" name="password2" id="" placeholder="Confirme su contraseña">
        
        
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

    
        <!-- hola -->
    </form>   
    </div> 
</div>

<div class="ico">
<a href="index.html"><i class="icono fas fa-sign-out-alt"></i></a>

</div>

</body>
</html>