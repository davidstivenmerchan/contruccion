<?php
     require_once 'includes/conexion.php';
?>
<?php
     $consul= "SELECT * FROM tipo_documento";
     $query= mysqli_query($mysqli,$consul);
     $respu= mysqli_fetch_assoc($query); 

     $consul= "SELECT * FROM tipo_usuario";
     $query1= mysqli_query($mysqli,$consul);
     $respu= mysqli_fetch_assoc($query1); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h1>REGISTRO DE USUARIOS</h1>
    <form action="">
        <input type="number" name="cc" id="" placeholder="Ingrese numero de documento">
        <input type="text" name="cod_carnet" id="" placeholder="Ingrese su numero de carnet">
        <input type="text" name="nom" id="" placeholder="Ingrese sus nombres">
        <input type="text" name="ape" id="" placeholder="Ingrese sus apellidos">
        <input type="text" name="genero" id="" placeholder="Ingrese su genero">
        <input type="text" name="correo_p" id="" placeholder="Ingrese su correo personal">
        <input type="text" name="correo_s" id="" placeholder="Ingrese su correo sena">
        <input type="number" name="correo_s" id="" placeholder="Ingrese su telefono">
        <input type="text" name="correo_s" id="" placeholder="Ingrese su contraseña">

        <select name="tip_doc" id="tip_doc" required>
                    <option value="">Seleccione el Tipo de Documento</option>
                    <?php
                        foreach ($query as $tipo_doc) :  ?>
                        <option value="<?php echo $tipo_doc['id_tipo_documento']?>"><?php echo $tipo_doc['nom_documento']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>

        <select name="tip_usu" id="tip_usu" required>
                    <option value="">Seleccione el Tipo de Usuario</option>
                    <?php
                        foreach ($query1 as $tipo_usu) :  ?>
                        <option value="<?php echo $tipo_usu['id_tipo_usuario']?>"><?php echo $tipo_usu['nom_tipo_usuario']?></option>
                    <?php
                        endforeach;
                    ?>
        </select>
      

    </form>    
</body>
</html>