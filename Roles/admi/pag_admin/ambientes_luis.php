<?php
    require_once './../../../includes/conexion.php';
    $consulta1 = "SELECT * FROM nave";
    $query1= mysqli_query($mysqli,$consulta1);
    $respu1= mysqli_fetch_assoc($query1); 

    $consulta2 = "SELECT * FROM jornada";
    $query2= mysqli_query($mysqli,$consulta2);
    $respu2= mysqli_fetch_assoc($query2); 

    $consulta3 = "SELECT * FROM formacion";
    $query3= mysqli_query($mysqli,$consulta3);
    $respu3= mysqli_fetch_assoc($query3); 

    $consulta4 = "SELECT * FROM detalle_formacion";
    $query4= mysqli_query($mysqli,$consulta4);
    $respu4= mysqli_fetch_assoc($query4);

    $consulta5 = "SELECT * FROM ambiente";
    $query5= mysqli_query($mysqli,$consulta5);
    $respu5= mysqli_fetch_assoc($query5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/aa14b1055f.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../admi/pag_admin/css/ambiente/formularios.css">
    <link rel="stylesheet" href="../admi/pag_admin/css/ambiente/ambientes.css">
    <link rel="stylesheet" href="../admi/pag_admin/css/ambiente/tablas.css">
</head>
<body>

    <section class="cards">
        <div class="card">
            <h3>Crear Naves</h3>

            <div class="botones">
                <button class="aparecerambientes formuambientes1" data-form="form"> <i class="aparecerambientes formuambientes1 fa fa-file-alt" title="Mostrar Datos de tipo dispositivo" data-form="form"></i> </button>
                <button class="aparecerambientes formuambientes7" data-form="formu4"> <i class="aparecerambientes formuambientes7 fa fa-keyboard" title="Registrar datos tipo dispositivo" data-form="formu6"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Jornada </h3>
        
            <div class="botones">
                <button class="aparecerambientes formuambientes2" data-form="formu1"> <i class="aparecerambientes formuambientes2 fa fa-file-alt" title="Mostrar Datos marca de equipos" data-form="formu1"></i></button>
                <button class="aparecerambientes formuambientes8" data-form="formu5"> <i class="aparecerambientes formuambientes8 fa fa-keyboard" title="Registrar dato marca de equipo" data-form="formu7"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Formacion </h3>

            <div class="botones">
                <button class="aparecerambientes formuambientes3" data-form="formu2"> <i class="aparecerambientes formuambientes3 fa fa-file-alt" title="Mostrar Datos estados dispositivos" data-form="formu2"></i></button>
                <button class="aparecerambientes formuambientes9" data-form="formu6"> <i class="aparecerambientes formuambientes9 fa fa-keyboard" title="Registrar dato estado dispositivo" data-form="formu8"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Detalle Formacion</h3>

            <div class="botones">
                <button class="aparecerambientes formuambientes4" data-form="formu3"> <i class="aparecerambientes formuambientes4 fa fa-file-alt" title="Mostrar Datos de estados de aprobacion" data-form="formu3"></i>  </button>
                <button class="aparecerambientes formuambientes10" data-form="formu7"> <i class="aparecerambientes formuambientes10 fa fa-keyboard" title="Registrar dato estado de aprobacion" data-form="formu9"></i> </button>
            </div>
        </div>
    </section>


    <div class="forms">
        <div class="form">
            <h2>Naves</h2>

            <table class="tablanave">
                <tr class="titulo">
                    <tr class="header" style="text-align: center;">
                        <td>Id</td>
                        <td>Nombre Nave</td>
                        <td class="acciones"> Accciones </td>
                    </tr>
                </tr>

                <?php
                    $sql="SELECT * FROM nave";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos" style="text-align: center;">
                    <td><?php echo $mostrar['id_nave'] ?></td>
                    <td><?php echo $mostrar['nom_nave'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" class="edit tipdispo" title="editar" data-tipdispo="<?php echo $mostrar['id_tipo_dispositivo'];?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" class="remove tipdispo" title="eliminar" data-tipdispo="<?php echo $mostrar['id_tipo_dispositivo'];?>">                     
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
            </table>
        </div>
        <div class="formu1 tablas">
            <h2>Jornadas</h2>
            <table class="tabla" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Nombre jornada</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from jornada";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_jornada']?></td>
                    <td><?php echo $eh['nom_jornada']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit marca" data-marca="<?php echo $eh['id_marca']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove marca" data-marca="<?php echo $eh['id_marca']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu2 tablas">
            <h2>Formaciones</h2>


            <table class="tabla" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Nombre formacion</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from formacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_formacion']?></td>
                    <td><?php echo $eh['nom_formacion']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" class="edit estado" alt="editar" title="editar" data-estado="<?php echo $eh['id_estado_dispositivo']; ?>">
                        <img src="./../../assets/trash-solid.svg" class="remove estado" alt="eliminar" title="eliminar" data-estado="<?php echo $eh['id_estado_dispositivo']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu3 tablas">
            <h2>Detalle de formacion</h2>


            <table class="tabla" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Nombre Formacion</td>
                    <td>Numero de ficha</td>
                    <td>Nombre Ambiente</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT id_detalle_formacion, nom_formacion,num_ficha, ambiente.nom_ambiente 
                    FROM detalle_formacion,formacion,ambiente 
                    WHERE detalle_formacion.id_formacion = formacion.id_formacion
                    AND detalle_formacion.id_ambiente = ambiente.id_ambiente";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_detalle_formacion']?></td>
                    <td><?php echo $eh['nom_formacion']?></td>
                    <td><?php echo $eh['num_ficha']?></td>
                    <td><?php echo $eh['nom_ambiente']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit aprobacion" data-estadoapro="<?php echo $eh['id_estado_aprobacion']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove aprobacion" data-estadoapro="<?php echo $eh['id_estado_aprobacion']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="form1 formu4">
            <p type="title">Crear Naves</p>
            <div class="linea"></div>
            <form id="nave" class="formulario">
    
                <label for="nom">Nombre de la Nave</label><br>
                <input type="text" name="nom_nave" id="nom_nave">

                <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu5">
            <p type="title">Crear Jornada</p>
            <div class="linea"></div>
            <form class="formulario" id="jornada">
                    <!--  -->
                    <label for="nom">Nombre de la Jornada</label><br>
                    <input type="text" name="nom_jornada" id="nom_jornada">
                    <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu6">
            <p type="title">Crear Formacion</p>
            <div class="linea"></div>
            <form class="formulario" id="formacion">
                <label for="nom">Nombre de la Formacion</label><br>
                <input type="text" name="nom_formacion" id="nom_formacion">
                <input type="submit" value="Guardar">
            </form>
        </div>


        <div class="form1 formu7">
            <p type="title">Crear Detalle Formacion</p>
            <div class="linea"></div>
            <form class="formulario" id="detalle_formacion">

                <select name="detalle" id="detalle" required>
                <option value="">Selecione una Formacion</option>
                <?php
                    foreach ($query3 as $i) :  ?>
                    <option value="<?php echo $i['id_formacion']?>"><?php echo $i['nom_formacion']?></option>
                <?php
                    endforeach;
                ?>
                </select>

                <label for="nom">Numero de ficha</label><br>
                <input type="text" name="num_ficha" id="num_ficha">

                <select name="ambiente" id="ambiente" required>
                <option value="">Seleccione un Ambiente</option>
                <?php
                    foreach ($query5 as $i) :  ?>
                    <option value="<?php echo $i['id_ambiente']?>"><?php echo $i['nom_ambiente']?></option>
                <?php
                    endforeach;
                ?>
                </select>
                <input type="submit" value="Guardar">
            </form>
        </div>
    </div>
</body>
</html>