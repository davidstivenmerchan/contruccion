<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/formularios2.css">
    <link rel="stylesheet" href="./pag_admin/css/equipos.css">
</head>
<body>

    <section class="cards">
        <div class="card">
            <h3>Crear tipo de dispositivos</h3>

            <div class="botones">
                <button class="aparecerequipos formula1" data-form="form"> aparecer </button>
                <button class="cerrarequipos formula1" data-form="form"> ocultar </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear la marca de los equipos </h3>
              
            <div class="botones">
                <button class="aparecerequipos formula2" data-form="formu1"> aparecer</button>
                <button class="cerrarequipos formula2" data-form="formu1"> ocultar </button>
            </div>
        </div>
        <div class="card">
            <h3>Crear estado del dispositivo </h3>

            <div class="botones">
                <button class="aparecerequipos formula3" data-form="formu2"> aparecer</button>
                <button class="cerrarequipos formula3" data-form="formu2"> ocultar </button>
            </div>
        </div>
        <div class="card">
            <h3> Crear estado de aprobacion </h3>

            <div class="botones">
                <button class="aparecerequipos formula4" data-form="formu3"> aparecer  </button>
                <button class="cerrarequipos formula4" data-form="formu3"> ocultar </button>
            </div>
        </div>
        <div class="card">
            <h3> crear estado de disponibilidad </h3>

            <div class="botones">
                <button class="aparecerequipos formula5" data-form="formu4"> aparecer  </button>
                <button class="cerrarequipos formula5" data-form="formu4"> ocultar </button>
            </div>
        </div>
    </section>
    <div class="forms">
        <div class="form1 form">
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

        <div class="form1 formu1">
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

        <div class="form1 formu2">
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


        <div class="form1 formu3">
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

        <div class="form1 formu4">
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
    </div>

    <script src="../js/equipos.js" type="module"></script>
</body>
</html>