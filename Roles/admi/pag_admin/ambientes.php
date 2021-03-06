<?php
    require_once './../../../includes/conexion.php';
    
    // Funcion para obtener los datos en los select 
    // de crear ambiente y detalle de formacion
    function consultar( $consulta, $mysqli ){
        return mysqli_query($mysqli, $consulta);
    } 

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
                <h3>Crear Ambiente</h3>
                <div class="botones">
                    <button class="aparecerambientes formuambientes5" data-form="formu8"> <i class="aparecerambientes formuambientes5 fa fa-file-alt" title="Mostrar Ambientes" data-form="formu8"></i>  </button>
                    <button class="aparecerambientes formuambientes11" data-form="formu9"> <i class="aparecerambientes formuambientes11 fa fa-keyboard" title="Registrar Ambiente" data-form="formu9"></i> </button>
                </div>
            </div>

        <div class="card">
            <h3>Crear Naves</h3>
            <div class="botones">
                <button class="aparecerambientes formuambientes1" data-form="form"> <i class="aparecerambientes formuambientes1 fa fa-file-alt" title="Mostrar Naves" data-form="form"></i> </button>
                <button class="aparecerambientes formuambientes7" data-form="formu4"> <i class="aparecerambientes formuambientes7 fa fa-keyboard" title="Registrar Nave" data-form="formu4"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Jornada </h3>
            <div class="botones">
                <button class="aparecerambientes formuambientes2" data-form="formu1"> <i class="aparecerambientes formuambientes2 fa fa-file-alt" title="Mostrar Jornadas" data-form="formu1"></i></button>
                <button class="aparecerambientes formuambientes8" data-form="formu5"> <i class="aparecerambientes formuambientes8 fa fa-keyboard" title="Registrar Jornada" data-form="formu5"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Formacion </h3>

            <div class="botones">
                <button class="aparecerambientes formuambientes3" data-form="formu2"> <i class="aparecerambientes formuambientes3 fa fa-file-alt" title="Mostrar Formaciones" data-form="formu2"></i></button>
                <button class="aparecerambientes formuambientes9" data-form="formu6"> <i class="aparecerambientes formuambientes9 fa fa-keyboard" title="Registrar Formacion" data-form="formu6"></i> </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear Fichas</h3>

            <div class="botones">
                <button class="aparecerambientes formuambientes4" data-form="formu3"> <i class="aparecerambientes formuambientes4 fa fa-file-alt" title="Mostrar Fichas" data-form="formu3"></i>  </button>
                <button class="aparecerambientes formuambientes10" data-form="formu7"> <i class="aparecerambientes formuambientes10 fa fa-keyboard" title="Registrar Fichas" data-form="formu7"></i> </button>
            </div>
        </div>
    </section>


    <div class="forms">

    <div class="formu8 tablas">
            <h2>Ambientes</h2>

            <table class="tablanave">
                <tr class="titulo">
                    <tr class="header" style="text-align: center;">
                        <td>Nombre Ambiente</td>
                        <td>Nombre Nave</td>
                        <td class="acciones"> Accciones </td>
                    </tr>
                </tr>

                <?php
                    $sql="SELECT n_ambiente,nom_nave 
                        FROM ambiente,nave 
                        WHERE ambiente.id_nave = nave.id_nave";
                    $result=mysqli_query($mysqli,$sql);

                    while($mostrar=mysqli_fetch_array($result)){

                    
                ?>


                <tr class="datos" style="text-align: center;">
                    <td><?php echo $mostrar['n_ambiente'] ?></td>
                    <td><?php echo $mostrar['nom_nave'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" class="edit ambiente" title="editar" data-ambiente="<?php echo $mostrar['id_ambiente'];?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" class="remove ambiente" title="eliminar" data-ambiente="<?php echo $mostrar['id_ambiente'];?>">                  
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
            </table>
        </div>

        <div class="form1 formu9">
            <p type="title">Crear Ambiente</p>
            <div class="linea"></div>
            <form class="formulario" id="ambientes">

                
                <input type="number" name="nom_ambiente" id="nom_ambiente" placeholder="Escriba el Numero Ambiente" pattern="^ \ d +$" required title="Solo se permiten letras y numeros" maxlength="6">

                <select name="nave" id="nave" style="width: 130%;" required>
                <option value="">Seleccione una Nave</option>
                <?php
                    
                    foreach (consultar("SELECT * FROM nave", $mysqli) as $i) : ?>
                    <option value="<?php echo $i['id_nave']?>"><?php echo $i['nom_nave']?></option>
                <?php
                    endforeach;
                ?>
                </select>
                <input type="submit" value="Guardar">
            </form>
        </div>



        <div class="form">
            <h2>Naves</h2>

            <table class="tablanave">
                <tr class="titulo">
                    <tr class="header" style="text-align: center;">
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
                    <td><?php echo $mostrar['nom_nave'] ?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" class="edit nave" title="editar" data-nave="<?php echo $mostrar['id_nave'];?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" class="remove nave" title="eliminar" data-nave="<?php echo $mostrar['id_nave'];?>">                  
                    </td>
                </tr>
                
                    <?php
                    }
                    ?>
            
            </table>
        </div>

        <div class="formu1 tablas">
            <h2>Jornadas</h2>
            <table class="tabla tablajornada" border=1 cellspacing="0">
                <tr class="header">             
                    <td>Nombre jornada</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from jornada";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">                
                    <td><?php echo $eh['nom_jornada']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit jornada" data-jornada="<?php echo $eh['id_jornada']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove jornada" data-jornada="<?php echo $eh['id_jornada']; ?>">                     
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
                    <td>Nombre formacion</td>
                    <td class="acciones"> Accciones </td>
                </tr>
                <?php 
            $con = "SELECT * from formacion";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['nom_formacion']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" class="edit formacion" alt="editar" title="editar" data-formacion ="<?php echo $eh['id_formacion']; ?>">
                        <img src="./../../assets/trash-solid.svg" class="remove formacion" alt="eliminar" title="eliminar" data-formacion ="<?php echo $eh['id_formacion']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="formu3 tablas">
            <h2>Fichas</h2>


            <table class="tabla" border=1 cellspacing="0" style="width: 60vw;">
                <tr class="header">
                    <td>ficha</td>
                    <td>Jornada</td>
                    <td>Ambiente</td>
                    <td>Nave</td>
                    <td>Formacion</td>
                    <td>Documento Instructor</td>
                    <td>Nombre Instructor</td>
                    <td>Apellido Instructor</td>
                    <td class="acciones">Acciones</td>
                </tr>
                <?php 
            $con = "SELECT ficha,nom_jornada,n_ambiente,nom_nave,nom_formacion,usuarios.documento,nombres,apellidos 
                    FROM fichas,usuarios,jornada,ambiente,nave,formacion 
                    WHERE fichas.id_jornada = jornada.id_jornada
                    AND fichas.id_ambiente = ambiente.id_ambiente
                    AND fichas.id_formacion = formacion.id_formacion
                    AND fichas.instructor = usuarios.documento
                    AND ambiente.id_nave = nave.id_nave";
            $m = mysqli_query($mysqli, $con);
            while($eh = mysqli_fetch_array($m)){           
            ?>

                <tr class="datos">
                    <td><?php echo $eh['ficha']?></td>
                    <td><?php echo $eh['nom_jornada']?></td>
                    <td><?php echo $eh['n_ambiente']?></td>
                    <td><?php echo $eh['nom_nave']?></td>
                    <td><?php echo $eh['nom_formacion']?></td>
                    <td><?php echo $eh['documento']?></td>
                    <td><?php echo $eh['nombres']?></td>
                    <td><?php echo $eh['apellidos']?></td>
                    <td class="imgs">
                        <img src="./../../assets/edit-solid.svg" alt="editar" title="editar" class="edit fichas" data-fichas="<?php echo $eh['ficha']; ?>">
                        <img src="./../../assets/trash-solid.svg" alt="eliminar" title="eliminar" class="remove fichas" data-fichas="<?php echo $eh['ficha']; ?>">                     
                    </td>
                </tr>
                <?php
            } 
            ?>
            </table>
        </div>

        <div class="form1 formu4">
            <p type="title">NAVE</p>
            <div class="linea"></div>
            <form id="nave" class="formulario" autocomplete="off">
                <input type="text" name="nom_nave" id="nom_nave" placeholder="Escribe el nombre de la nave" pattern="^ [ a-zA-Z0-9\s]+$" required title="Solo se permiten letras y numeros" maxlength="20">
                <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu5">
            <p type="title">JORNADA</p>
            <div class="linea"></div>
            <form class="formulario" id="jornada" autocomplete="off">
                    <input type="text" name="nom_jornada" id="nom_jornada" placeholder="Escribe el nombre de la jornada" pattern="^[A-Za-z????????????????????????????\s]+$" required title="Solo se permiten letras" maxlength="20">
                    <input type="submit" value="Guardar">
            </form>
        </div>

        <div class="form1 formu6">
            <p type="title">FORMACION</p>
            <div class="linea"></div>
            <form class="formulario" id="formacion" autocomplete="off">
                <input type="text" name="nom_formacion" id="nom_formacion" placeholder="Escribe el nombre de la Formacion" pattern="^[A-Za-z????????????????????????????\s]+$" required title="Solo se permiten letras" maxlength="20" />
                <input type="submit" value="Guardar" />
            </form>
        </div>


        <div class="form1 formu7">
            <p type="title">FICHAS</p>
            <div class="linea"></div>
            <form class="formulario" id="fichas" autocomplete="off">

                <input type="number" name="numero_ficha" id="numero_ficha" placeholder="Escriba el numero de ficha" pattern="^ [0-9\s]+$" required title="Solo se permiten numeros" maxlength="7">

                <select name="tip_jornada" id="tip_jornada" required>
                <option value="">Selecione una Jornada</option>
                <?php
                    foreach (consultar("SELECT * FROM jornada", $mysqli) as $i) :  ?>
                    <option value="<?php echo $i['id_jornada']?>"><?php echo $i['nom_jornada']?></option>
                <?php
                    endforeach;
                ?>
                </select>

                <select name="tip_ambiente" id="tip_ambiente" required>
                <option value="">Seleccione un Ambiente</option>
                <?php
                    foreach (consultar("SELECT * FROM ambiente", $mysqli) as $i) :  ?>
                    <option value="<?php echo $i['id_ambiente']?>"><?php echo $i['n_ambiente']?></option>
                <?php
                    endforeach;
                ?>
                </select>

                <select name="nom_formacion" id="nom_formacion" required>
                <option value="">Selecione una Formacion</option>
                <?php
                    foreach (consultar("SELECT * FROM formacion", $mysqli) as $i) :  ?>
                    <option value="<?php echo $i['id_formacion']?>"><?php echo $i['nom_formacion']?></option>
                <?php
                    endforeach;
                ?>
                </select>

                <select name="doc_instruc" id="doc_instruc" required>
                <option value="">Selecione un Instructor</option>
                <?php
                    foreach (consultar("SELECT * FROM usuarios WHERE id_tipo_usuario = 3", $mysqli) as $i) :  ?>
                    <option value="<?php echo $i['documento']?>"><?php echo $i['documento'] ." ". $i['Nombres']." ".$i['Apellidos']?></option>
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