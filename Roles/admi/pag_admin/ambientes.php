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
    <link rel="stylesheet" href="./pag_admin/css/ambiente.css">
    <link rel="stylesheet" href="./pag_admin/css/tablas_ambiente.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <section class="cards">
        <div class="card">
            <h3>Naves</h3>

            <div class="botones">
                <span><button class="aparecer formu1" data-form="form"> <i class="fa fa-file-alt" title="Mostrar Datos de Nave"></i> </button></span>
                <span><button class="aparecer formu5" data-form="form3"> <i class="fa fa-keyboard" title="Registrar datos de Naves"></i> </button></span>
            </div>
        </div>
        <div class="card">
        <h3>Jornada</h3>

            <div class="botones">
                <span> <button class="aparecer fomu2" data-form="form1"><i class="fa fa-file-alt" title="Mostrar Datos de Jornadas"></i></button> </span>
                <span> <button class="aparecer formu6" data-form="form4"><i class="fa fa-keyboard" title="Registrar datos de Jornadas"></i></button> </span>
            </div>
        </div>
        <div class="card">
        <h3>Formacion</h3>

            <div class="botones">
                <span> <button class="aparecer formu3" data-form="form2"><i class="fa fa-file-alt" title="Mostrar Datos de Formacion"></i></button> </span>
                <span> <button class="aparecer formu7" data-form="form5"><i class="fa fa-keyboard" title="Registrar datos de Formaciones"></i></button> </span>
            </div>
        </div>
        <div class="card">
        <h3>Detalles de formacion</h3>

            <div class="botones">
                <span> <button class="aparecer formu4" data-form="form"><i class="fa fa-file-alt" title="Mostrar Datos de Formacion"></i></button> </span>
                <span> <button class="aparecer formu8" data-form="form4"><i class="fa fa-keyboard" title="Registrar datos de Formaciones"></i></button> </span>
            </div>
        </div>
    </section>

    
    <div class="form">
    <table class="tablausu">
                <tr class="titulo">
                    <td>Id</td>
                    <td>Nave</td>
                    <td>Acciones</td>

                <?php
                    $sql="SELECT * from nave";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos">
                    <td><?php echo $mostrar['id_nave'] ?></td>
                    <td><?php echo $mostrar['nom_nave'] ?></td>
                    <td class="imgss">
                    <i class="ico fas fa-edit"></i> |    
                    <a href="" class="clickborrar"><i class="ico fas fa-trash"></i></a>              
                    </td>
                
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
    <div class="form1 form2">

    <table class="tabla">
            <tr class="titulo">
                <td>Id</td>
                <td>Ficha</td>
                <td>Formacion</td>
                <td>Nave</td>

                
            </tr>

            <?php
                $sql="SELECT * from detalle_formacion inner join formacion using (id_formacion) inner join ambiente using(id_ambiente) inner join nave using(id_nave)
                ";
                $result=mysqli_query($mysqli,$sql);

                while($mostrar=mysqli_fetch_array($result)){

                
            ?>


            <tr class="datos">
                <td><?php echo $mostrar['id_detalle_formacion'] ?></td>
                <td><?php echo $mostrar['num_ficha'] ?></td>
                <td><?php echo $mostrar['nom_formacion'] ?></td>
                <td><?php echo $mostrar['nom_nave'] ?></td>

            </tr>
            
                <?php
                }
                ?>
        
        </table>




    </div>
    <div class="form form1 form2 form3">
    <p type="title">Crear Nave</p>
    <div class="linea"></div>
    <form action="pag_admin/crearnave.php" method="POST" id="crearnave">
        
        <p type="nom">
            <label style="position:absolute; left:55%;" for="nom">Numero de la nave<br>
            <br>
            <input style="position:absolute; left:-82px;" type="text" name="numero">
        </p>
        <p>
            <br>
            <br>
            <br>
            <br>
        <center>

        <input style="margin-left:70%;" type="submit" value="Crear"  id="crearnav" name="crearnave">

        </center>
        
        
        </p>
    </form>
   
    </div>
    
     
    

    <div class="form form1 form2 form3 form4">
    <p type="title">Crear Jornada</p>
    <div class="linea"></div>
    <form action="pag_admin/crearjornada.php" method="POST" id="crearjor">
        
        <p type="nom">
            <label style="position:absolute; left:58%;" for="nom">Jornada<br>
            <br>
            <input style="position:absolute; left:-120px;" type="text" name="jornada" id="nom_usu">
        </p>
        <p>
            <br>
            <br>
            <br>
            <br>
        <center>

        <input style="margin-left:75%;" type="submit" value="Guardar" name="enviar3" id="crearjornada">

        </center>
        

        </p>
    </form>
    


    </div>
    
    

    <div class="form form1 form2 form3 form4 form5">
    <p type="title">Crear Formacion</p>
    <div class="linea"></div>
    <form action="pag_admin/crearformacion.php" method="POST">
        
        <p type="nom">
            <label style="position:absolute; left:50%;" for="nom">Nombre del programa de formacion<br>
            <br>
            <input style="position:absolute;" type="text" name="formacion" id="nom_usu">
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
    <div class="form form1 form2 form3 form4 form5 form6 form7">
    <p type="title">Crear Fichas</p>
    <div class="linea"></div>
    <form action="pag_admin/creardetallformacion.php" method="POST">
        
        <p type="nom">
            <label style="position:absolute; left:50%; margin:auto;">Numero de ficha<br>
            <br>
            <input style="" type="text" name="numficha" id="nom_usu">
        </p>
        <p>
            <br>
            <br>
           <br>
           <br>
           <label style="position:absolute; left:50%;">Selecciona el programa de formacion<br>
           <br>
           
           <select  name="programa" id="" class="" style="position:absolute;left:50%;">
                        <?php 
                        $tipdoc = mysqli_query($mysqli, "SELECT * from formacion");
                        while($tipdocu = mysqli_fetch_row($tipdoc)){

                        ?>
                        <option value="<?php echo $tipdocu[0]?>"><?php echo $tipdocu[1]?></option>
                        <?php } ?>

                    </select>

                    <br>
                    <br>
            <label style="">Selecciona la nave<br>
           <br>
           
           <select  name="nave" id="" class="" style="position:absolute;left:50%;">
                        <?php 
                        $tipdoc = mysqli_query($mysqli, "SELECT * from nave");
                        while($tipdocu = mysqli_fetch_row($tipdoc)){

                        ?>
                        <option value="<?php echo $tipdocu[0]?>"><?php echo $tipdocu[1]?></option>
                        <?php } ?>

                    </select>


        <center>

        <input style="margin-top:8rem; margin-left:380px;" type="submit" value="Guardar" name="enviar3">

        </center>
        
           
        </p>
    </form>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</body>
</html>