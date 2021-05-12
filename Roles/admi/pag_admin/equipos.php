<?php
    require_once './../../../includes/conexion.php';
    $consulta1 = "SELECT * FROM tipo_dispositivo";
    $query1= mysqli_query($mysqli,$consulta1);
    $respu1= mysqli_fetch_assoc($query1); 

    $consulta2 = "SELECT * FROM estado_disponibilidad";
    $query2= mysqli_query($mysqli,$consulta2);
    $respu2= mysqli_fetch_assoc($query2); 

    $consulta3 = "SELECT * FROM estado_dispositivo";
    $query3= mysqli_query($mysqli,$consulta3);
    $respu3= mysqli_fetch_assoc($query3); 

    $consulta4 = "SELECT * FROM marca";
    $query4= mysqli_query($mysqli,$consulta4);
    $respu4= mysqli_fetch_assoc($query4); 
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
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/equipos.css">
    <link rel="stylesheet" href="./../../css/tablas.css">
</head>
<body>

    <section class="cards">
        <div class="card">
            <h3>Crear tipo de dispositivos</h3>

            <div class="botones">
                <button class="aparecerequipos formula1" data-form="form"> <i class="fa fa-file-alt" title="Mostrar Datos de tipo dispositivo"></i> </button>
                <button class="aparecerequipos formula7" data-form="formu6"> <i class="fa fa-keyboard" title="Registrar datos tipo dispositivo"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear marca de equipos </h3>
        
            <div class="botones">
                <button class="aparecerequipos formula2" data-form="formu1"> <i class="fa fa-file-alt" title="Mostrar Datos marca de equipos"></i></button>
                <button class="aparecerequipos formula8" data-form="formu7"> <i class="fa fa-keyboard" title="Registrar dato marca de equipo"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado dispositivo </h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="formu2"> <i class="fa fa-file-alt" title="Mostrar Datos estados dispositivos"></i></button>
                <button class="aparecerequipos formula9" data-form="formu8"> <i class="fa fa-keyboard" title="Registrar dato estado dispositivo"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado aprobacion</h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="formu3"> <i class="fa fa-file-alt" title="Mostrar Datos de estados de aprobacion"></i>  </button>
                <button class="aparecerequipos formula10" data-form="formu9"> <i class="fa fa-keyboard" title="Registrar dato estado de aprobacion"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear disponibilidad</h3>

            <div class="botones">
                <button class="aparecerequipos formula5" data-form="formu4"> <i class="fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad"></i>  </button>
                <button class="aparecerequipos formula11" data-form="formu10"> <i class="fa fa-keyboard" title="Registrar dato de estado de disponibilidad"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3> Equipos</h3>

            <div class="botones">
                <button class="aparecerequipos formula6" data-form="formu5"> <i class="fa fa-file-alt" title="Mostrar Datos de estados de disponibilidad"></i>  </button>
                <button class="aparecerequipos formula12" data-form="formu11"> <i class="fa fa-keyboard" title="Registrar dato de estado de disponibilidad"></i> </button>
            </div>
        </div>
    </section>
    <div class="forms">
        <div class="form">
            <h2>Tipo de dispositivos</h2>

            <table class="tabla">
                <tr class="titulo">
                    <tr class="header" style="text-align: center;">
                        <td>Id Tipo Dispositivo</td>
                        <td>Nombre Tipo Dispositivo</td>
                        <td class="acciones"> Accciones </td>
                    </tr>
                </tr>

                <?php
                    $sql="SELECT * FROM tipo_dispositivo";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos" style="text-align: center;">
                    <td><?php echo $mostrar['id_tipo_dispositivo'] ?></td>
                    <td><?php echo $mostrar['nom_tipo_dispositivo'] ?></td>
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
            <h2>Marcas</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Marca</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from marca";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_marca']?></td>
                    <td><?php echo $eh['nom_marca']?></td>
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
            <h2>Estados de los dispositivos</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from estado_dispositivo";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_dispositivo']?></td>
                    <td><?php echo $eh['nom_estado_dispositivo']?></td>
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
            <h2>Estados de aprobacion</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_aprobacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_aprobacion']?></td>
                    <td><?php echo $eh['nom_aprobacion']?></td>
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

        <div class="formu4 tablas">
            <h2>Estados de disponibilidad</h2>


            <table class="tablamarca" border=1 cellspacing="0">
                <tr class="header">
                    <td>Id</td>
                    <td>Estado</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT * from estado_disponibilidad";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['id_estado_disponibilidad']?></td>
                    <td><?php echo $eh['nom_estado_disponibilidad']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit disponibi" data-estadodisponi="<?php echo $eh['id_estado_disponibilidad']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove disponibi" data-estadodisponi="<?php echo $eh['id_estado_disponibilidad']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>
        <div class="formu5 tablas">
            <h1>hola mundo</h1>
        </div>
        <div class="form1 formu6">
            <p type="title">Crear tipos de Dispositivos</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_dis" id="id_dis">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Tipo de Dispositivo</label><br>
                    <input type="text" name="nom_dis" id="nom_dis">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu7">
            <p type="title">Crear la Marca de los Equipos</p>
            <div class="linea"></div>
            <form action="">
                <p>
                    <label for="id">ID</label><br>
                    <input type="number" name="id_marca" id="id_marca">
                </p>
                <p type="nom">
                    <label for="nom">Nombre de la Marca</label><br>
                    <input type="text" name="nom_marca" id="nom_marca">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu8">
            <p type="title">Crear Estado del Dispositivo</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado del Dispositivo</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>


        <div class="form1 formu9">
            <p type="title">Crear Estado de Aprobacion</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado de Aprobacion</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>

        <div class="form1 formu10">
            <p type="title">Crear Estado de Disponibilidad</p>
            <div class="linea"></div>
            <form action="">
                <p>
                <label for="id">ID</label><br>
                <input type="number" name="id_estado" id="id_estado">
                </p>
                <p type="nom">
                    <label for="nom">Nombre del Estado de Disponibilidad</label><br>
                    <input type="text" name="nom_estado" id="nom_estado">
                </p>
                <p>
                    <button>Guardar</button>
                </p>
            </form>
        </div>
        <div class="form1 formu11">
            <h1>Registro de Dispositivos Electronicos </h1>

            <form action="registro_dispositivo_e.php" method="POST" class="fommu">

            <p>
                <label for="serial">Serial</label>
                <input type="number" name="serial" id="serial" >
            </p>
            <p>
                <label for="placa_sena">Placa Sena</label>
                <input type="text" name="placa_sena" id="placa_sena" autocomplete="off">
            </p>
            <p>
                <label for="nom_dispositivo">Nombre Dispositivo</label>
                <input type="text" name="nom_dispositivo" id="nom_dispositivo" autocomplete="off">
            </p>
            <!-- selectores  -->
            <select name="id_tipo_dis" id="id_tipo_dis" required>
            <option value="">Seleccione el Tipo de Dispositivo</option>
            <?php
                foreach ($query1 as $i) :  ?>
                <option value="<?php echo $i['id_tipo_dispositivo']?>"><?php echo $i['nom_tipo_dispositivo']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <!-- selectores  2 -->
            <select name="estado_disponi" id="estado_disponi" required>
            <option value="">Seleccione el Tipo de Disponibilidad</option>
            <?php
                foreach ($query2 as $i) :  ?>
                <option value="<?php echo $i['id_estado_disponibilidad']?>"><?php echo $i['nom_estado_disponibilidad']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <!-- selectores  3 -->
            <select name="estado_disposi" id="estado_disposi" required>
            <option value="">Seleccione el Tipo de Estado</option>
            <?php
                foreach ($query3 as $i) :  ?>
                <option value="<?php echo $i['id_estado_dispositivo']?>"><?php echo $i['nom_estado_dispositivo']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <!-- selectores  4 -->
            <select name="marca" id="marca" required>
            <option value="">Marca</option>
            <?php
                foreach ($query4 as $i) :  ?>
                <option value="<?php echo $i['id_marca']?>"><?php echo $i['nom_marca']?></option>
            <?php
                endforeach;
            ?>
            </select>

            <input type="submit" value="REGISTRAR" name="registrar" class="resgi">
            </form>
        </div>
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>