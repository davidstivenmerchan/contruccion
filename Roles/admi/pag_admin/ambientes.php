<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/ambientes.css">
</head>
<body>
<div class="form1">
    <p type="title">Crear Naves</p>
    <div class="linea"></div>
    <form action="../insert_nave.php" method="post">
        <p>
        <label for="id">ID</label><br>
        <input type="number" name="id_nave" id="id_nave">
        </p>
        <p type="nom">
            <label for="nom">Nombre de la Nave</label><br>
            <input type="text" name="nom_nave" id="nom_nave">
        </p>
        <p>
            <button>Guardar</button>
        </p>
    </form>
</div>

<div class="form1">
    <p type="title">Crear la jornada</p>
    <div class="linea"></div>
    <form action="../insert_jornada.php" method="post">
        <p>
        <label for="id">ID</label><br>
        <input type="number" name="id_jornada" id="id_jornada">
        </p>
        <p type="nom">
            <label for="nom">Nombre de la Jornada</label><br>
            <input type="text" name="nom_jornada" id="nom_jornada">
        </p>
        <p>
            <button>Guardar</button>
        </p>
    </form>
</div>    

<div class="form1">
    <p type="title">Crear la Formacion</p>
    <div class="linea"></div>
    <form action="../insert_formacion.php" method="post">
        <p>
        <label for="id">ID</label><br>
        <input type="number" name="id_formacion" id="id_formacion">
        </p>
        <p type="nom">
            <label for="nom">Nombre de la Formacion</label><br>
            <input type="text" name="nom_formacion" id="nom_formacion">
        </p>
        <p>
            <button>Guardar</button>
        </p>
    </form>
</div>
</body>
</html>