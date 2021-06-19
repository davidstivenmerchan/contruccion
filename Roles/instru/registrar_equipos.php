<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/equipos.css">
    <link rel="stylesheet" href="./../../css/tablas.css">
    <title>Document</title>
</head>
<body>
<div class="form1 formu11">
            <h2>Registro de Dispositivos Electronicos </h2>

            <form id="formuDispositivo"class="fommu">

                <label for="serial">Serial</label>
                <input type="number" name="serial" id="serial" >

                <label for="placa_sena">Placa Sena</label>
                <input type="text" name="placa_sena" id="placa_sena" autocomplete="off">

                <label for="nom_dispositivo">Nombre Dispositivo</label>
                <input type="text" name="nom_dispositivo" id="nom_dispositivo" autocomplete="off">

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

</body>
</html>
