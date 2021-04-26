<?php
    require_once ("../conexion/conexion.php");
?>
<?php
    $consul= "SELECT nom_tip_doc FROM tipo_documento";
    $query= mysqli_query($mysqli,$consul);
    $respu= mysqli_fetch_assoc($query);  
    
    $consul= "SELECT nom_tip_usu FROM tipo_usuario";
    $query1= mysqli_query($mysqli,$consul);
    $respu= mysqli_fetch_assoc($query1);  

    $consul= "SELECT nom_tip_dis FROM tipo_dispositivo";
    $query2= mysqli_query($mysqli,$consul);
    $respu= mysqli_fetch_assoc($query2); 

    $consul= "SELECT nom_marca FROM marca";
    $query3= mysqli_query($mysqli,$consul);
    $respu= mysqli_fetch_assoc($query3); 

    $consul= "SELECT nom_estado FROM estado";
    $query4= mysqli_query($mysqli,$consul);
    $respu= mysqli_fetch_assoc($query4); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/diseño.css">
    <title>Administrador</title>
</head>
<body>
    <div class="menu">
        <img src="../img/logo.sena.png" alt="">
        <h1>ADMINISTRADOR</h1>
        <P>CREAR</P>
        <input type="button" value="Usuarios"  ondblclick="aparecer()" onclick="desaparecer()">
        <input type="button" value="Equipos" ondblclick="aparecer1()" onclick="desaparecer1()">
        <a href="../index.html"><input type="button" value="Cerrar Sesion"></a>
    </div>
    <div class="form1" id="form1">
        <h1>Crear Usuarios</h1>
        <form action="../includes/guardar.php" method="POST" autocomplete="off">
            <label for="doc">Documento</label>
            <input type="text" name="doc" placeholder="Digite numero de documento del usuario">
            <label for="name">Nombre completo</label>
            <input type="text" name="nombre" placeholder="Digite el nombre del usuario">
            <label for="date">Fecha de Nacimiento</label>
            <input type="date" name="date" placeholder="Digite la fecha de nacimiento del usuario">
            <label for="phone">Celular</label>
            <input type="number" name="num" placeholder="Digite el numero de telefono del usuario">
            <label for="address">Direccion</label>
            <input type="text" name="direc" placeholder="Digite la direccion del usuario">
            <label for="email">Correo Electronico</label>
            <input type="text" name="email" placeholder="Digite la direccion de correo electronico del usuario">
            <label for="clave">Contraseña</label>
            <input type="text" name="clave" placeholder="Digite la clave del usuario">
            <label for="Tipo_doc">Tipo de Documento </label>
            <select name="tip_doc" id="tip_doc" required>
            <option value="">Seleccione el Tipo de Documento</option>
            <?php
                foreach ($query as $tipo_doc) :  ?>
                <option value="<?php echo $tipo_doc['nom_tip_doc']?>"><?php echo $tipo_doc['nom_tip_doc']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <label for="Tipo_usu">Tipo de Usuario </label>
            <select name="tip_usu" id="tip_usu" required>
            <option value="">Seleccione el Tipo de Usuario</option>
            <?php
                foreach ($query1 as $tipo_usu) :  ?>
                <option value="<?php echo $tipo_usu['nom_tip_usu']?>"><?php echo $tipo_usu['nom_tip_usu']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <input type="submit" value="Guardar" name="boton1">
            <input type="submit" value="Mostrar" name="boton2"ondblclick="aparecer2()" onclick="desaparecer2()">

        </form>

    </div>
    <div class="form2" id="form2">
        <h1>Crear Equipos</h1>
        <form action="../includes/guardar1.php" method="POST" autocomplete="off">
            <label for="serial">Serial </label>
            <input type="text" name="codigo" placeholder="Digite el numero de serial del equipo"><br>
            <label for="modelo">Modelo </label>
            <input type="text" name="modelo" placeholder="Digite el modelo del equipo"><br>
            <label for="Tipo_equipo">Tipo de Equipo</label>
            <select name="tip_dis" id="tip_dis" required>
            <option value="">Seleccione el Tipo de Equipo</option>
            <?php
                foreach ($query2 as $tipo_dis) :  ?>
                <option value="<?php echo $tipo_dis['nom_tip_dis']?>"><?php echo $tipo_dis['nom_tip_dis']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <label for="marca">Marca</label>
            <select name="marca" id="marca" required>
            <option value="">Seleccione la marca del Equipo</option>
            <?php
                foreach ($query3 as $mar) :  ?>
                <option value="<?php echo $mar['nom_marca']?>"><?php echo $mar['nom_marca']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <label for="estado">Estado</label>
            <select name="estado" id="estado" required>
            <option value="">Seleccione el estado del Equipo</option>
            <?php
                foreach ($query4 as $esta) :  ?>
                <option value="<?php echo $esta['nom_estado']?>"><?php echo $esta['nom_estado']?></option>
            <?php
                endforeach;
            ?>
            </select>
            <input type="submit" value="Guardar" name="boton3">
            <input type="submit" value="Mostar" name="boton4" ondblclick="aparecer3()" onclick="desaparecer3()">
        </form>
    </div>


    <div class="tabla" id="tabla"> 
        <table>
            <tr>
                <td>Documento</td>
                <td>Nombre Completo</td>
                <td>Fecha de Nacimiento</td>
                <td>Celular</td>
                <td>Direccion</td>
                <td>Email</td>
                <td>Clave</td>
                <td>Tipo de Documento</td>
                <td>Tipo de Usuario</td>
            </tr>
            <?php
            $sql="SELECT documento, nombre_completo, fecha_nacimiento, celular, direccion, email, clave, nom_tip_doc, nom_tip_usu FROM usuarios, tipo_documento, tipo_usuario WHERE tipo_documento.id_tip_doc=usuarios.id_tip_doc AND tipo_usuario.id_tip_usu=usuarios.id_tip_usu";
            $resultado=mysqli_query($mysqli,$sql);

            while($mostrar=mysqli_fetch_array($resultado)){
            ?>
                <tr>
                    <td><?php echo $mostrar['documento']?></td>
                    <td><?php echo $mostrar['nombre_completo']?></td>
                    <td><?php echo $mostrar['fecha_nacimiento']?></td>
                    <td><?php echo $mostrar['celular']?></td>
                    <td><?php echo $mostrar['direccion']?></td>
                    <td><?php echo $mostrar['email']?></td>
                    <td><?php echo $mostrar['clave']?></td>
                    <td><?php echo $mostrar['nom_tip_doc']?></td>
                    <td><?php echo $mostrar['nom_tip_usu']?></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>
    <div class="tabla2" id="tabla2"> 
        <table>
            <tr>
                <td>Serial</td>
                <td>Modelo</td>
                <td>Tipo de Equipo</td>
                <td>Marca</td>
                <td>Modelo</td>
            </tr>
            <?php
            $sql="SELECT serial, modelo, nom_tip_dis, nom_marca, nom_estado FROM equipos, tipo_dispositivo, marca, estado WHERE tipo_dispositivo.id_tip_dis=equipos.id_tip_dis AND marca.id_marca=equipos.id_marca AND estado.id_estado=equipos.id_estado";
            $resul=mysqli_query($mysqli,$sql);

            while($mostrar=mysqli_fetch_array($resul)){
            ?>
                <tr>
                    <td><?php echo $mostrar['serial']?></td>
                    <td><?php echo $mostrar['modelo']?></td>
                    <td><?php echo $mostrar['nom_tip_dis']?></td>
                    <td><?php echo $mostrar['nom_marca']?></td>
                    <td><?php echo $mostrar['nom_estado']?></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </div>

</body>
<script src="../includes/admin.js"></script>
</html>