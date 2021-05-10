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

     $consul2= "SELECT * FROM formacion";
     $query2= mysqli_query($mysqli,$consul2);
     $respu2= mysqli_fetch_assoc($query2); 

     $consul3= "SELECT * FROM nave";
     $query3= mysqli_query($mysqli,$consul3);
     $respu3= mysqli_fetch_assoc($query3); 

     $consul4= "SELECT * FROM jornada";
     $query4= mysqli_query($mysqli,$consul4);
     $respu4= mysqli_fetch_assoc($query4); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="css/resgistrousuarios.css">
</head>
<body>
<div class="papadepapa">


<div class="papa">
    <h1>REGISTRO DE USUARIOS</h1>
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
        <label>Fecha de Nacimiento: </label>
        <input type="date" name="date" id="">
        <input class="foto"type="file" name="imagen" id="imagen">

    </div>   
        
        
    
        
    <div class="sele3">

        <select name="formacion" id="formacion" required>
                    <option value="">Seleccione la formacion</option>
                    <?php
                        foreach ($query2 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_formacion']?>"><?php echo $tipo_usu['nom_formacion']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>

        <input type="number" name="n_ficha" id="n_ficha" placeholder="Ingrese el Numero de Ficha">

        <select name="nave" id="nave" required>
                    <option value="">Seleccione la nave</option>
                    <?php
                        foreach ($query3 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_nave']?>"><?php echo $tipo_usu['nom_nave']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
    
    </div>
    <div class="sele5">
        <select name="jornada" id="jornada" required>
                    <option value="">Seleccione la jornada</option>
                    <?php
                        foreach ($query4 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_jornada']?>"><?php echo $tipo_usu['nom_jornada']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>

        <input type="number" name="n_number_ambiente" id="n_number_ambiente" placeholder="numero de ambiente">

        <input type="date" name="date_matricula" id="date_matricula">

    </div>
        
    
    <div class="sele4">
        <input type="submit" value="REGISTRAR" name="enviar">
    </div>

    
        <!-- hola -->
    </form>   
    </div> 
</div>
</body>
</html>