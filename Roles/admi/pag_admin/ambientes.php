<?php
     require_once '../../../includes/conexion.php';
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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="./pag_admin/css/usuarios.css">
    <link rel="stylesheet" href="../../css/mostrar_tablas.css">

</head>
<body>
    <section class="cards">
        <div class="card">
            <h3>Naves</h3>

            <div class="botones">
                <span><button class="aparecer formu1" data-form="form"> <i class="fa fa-file-alt" title="Mostrar Datos de Nave"></i> </button></span>
                <span><button class="aparecer formu4" data-form="form3"> <i class="fa fa-keyboard" title="Registrar datos de Naves"></i> </button></span>
            </div>
        </div>
        <div class="card">
        <h3>Jornada</h3>

            <div class="botones">
                <span> <button class="aparecer fomu2" data-form="form1"><i class="fa fa-file-alt" title="Mostrar Datos de Jornadas"></i></button> </span>
                <span> <button class="aparecer formu5" data-form="form4"><i class="fa fa-keyboard" title="Registrar datos de Jornadas"></i></button> </span>
            </div>
        </div>
        <div class="card">
        <h3>Formacion</h3>

            <div class="botones">
                <span> <button class="aparecer formu3" data-form="form2"><i class="fa fa-file-alt" title="Mostrar Datos de Formacion"></i></button> </span>
                <span> <button class="aparecer formu6" data-form="form5"><i class="fa fa-keyboard" title="Registrar datos de Formaciones"></i></button> </span>
            </div>
        </div>
    </section>

    
    <div class="form">
    <table class="tablausu">
                <tr class="titulo">
                    <td>Id</td>
                    <td>Nave</td>
                    

                <?php
                    $sql="SELECT * from nave";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos">
                    <td><?php echo $mostrar['id_nave'] ?></td>
                    <td><?php echo $mostrar['nom_nave'] ?></td>
                
                </tr>
                
                    <?php
                    }
                    ?>
            
        </table>
    
    </div>






    <div class="form1">

    <table class="tabla">
            <tr class="titulo">
                
                <td>Id</td>
                <td>Jornada</td>
            </tr>

            <?php
                $sql="SELECT * FROM jornada";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['id_jornada'] ?></td>
                <td><?php echo $mostrar['nom_jornada'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>
    </div>


    <div class="form1 form2">

    <table class="tabla">
            <tr class="titulo">
                <td>Id</td>
                <td>Formacion</td>
            </tr>

            <?php
                $sql="SELECT * FROM formacion";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['id_formacion'] ?></td>
                <td><?php echo $mostrar['nom_formacion'] ?></td>
            </tr>
            
                <?php
                }
                ?>
        
        </table>




    </div>
    <div class="form form1 form2 form3">
    <p type="title">Crear Nave</p>
    <div class="linea"></div>
    <form action="insertarusuarios.php" method="POST">
        
        <p type="nom">
            <label style="position:absolute; left:55%;" for="nom">Numero de la nave<br>
            <br>
            <input style="position:absolute; left:-82px;" type="text" name="nom_usu" id="nom_usu">
        </p>
        <p>
            <br>
            <br>
            <br>
            <br>
        <center>

        <input style="margin-left:70%;" type="submit" value="Crear" name="enviar3">

        </center>
        
        
        </p>
    </form>
    </div>

    <div class="form form1 form2 form3 form4">
    <p type="title">Crear Jornada</p>
    <div class="linea"></div>
    <form action="insertarusuarios.php" method="POST">
        
        <p type="nom">
            <label style="position:absolute; left:58%;" for="nom">Jornada<br>
            <br>
            <input style="position:absolute; left:-120px;" type="text" name="nom_usu" id="nom_usu">
        </p>
        <p>
            <br>
            <br>
            <br>
            <br>
        <center>

        <input style="margin-left:75%;" type="submit" value="Guardar" name="enviar3">

        </center>
        

        </p>
    </form>
    


    </div>

    <div class="form form1 form2 form3 form4 form5">
    <p type="title">Crear Formacion</p>
    <div class="linea"></div>
    <form action="insertarusuarios.php" method="POST">
        
        <p type="nom">
            <label style="position:absolute; left:50%;" for="nom">Nombre del programa de formacion<br>
            <br>
            <input style="position:absolute; left:50%;" type="text" name="nom_usu" id="nom_usu">
        </p>
        <p>
            <br>
            <br>
            <br>
            <br>
        <center>

        <input style="margin-left:75%;" type="submit" value="Guardar" name="enviar3">

        </center>
        
        
        </p>
    </form>


    </div>

</body>
</html>