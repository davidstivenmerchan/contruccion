

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- <link rel="stylesheet" href="./css/calendario.css"> -->
</head>
<body>
    <div class="container">
        <?php require './banner.php'; ?>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle" onclick="toggleMenu();"></div>
            <div class="search">
                <label>
                    <input type="text" placeholder="searh">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </label>
                
            </div>
            <div class="user">
                <img src="../../assets/senaf.jpg" height="70px" alt="">
            </div>
        </div>
        <main> 
        </main>

        <!-- calendario 
            <div class="cardBox">
                <div class="root">
                    <div class="calendar" id="calendar">
            
                    </div>
                </div>
                <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
                <script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
                <script  type="text/javascript" src="./js/calendar.js"></script>
                <script type="text/javascript">
                    let calendar = new Calendar('calendar');
                    calendar.getElement().addEventListener('change', e => {
                        console.log(calendar.value().format('LLL'));
                    });
                </script>   
            </div>
        </div>-->
    <!-- MENU -->
    
    
    <script>
        function toggleMenu()
        {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation');
            let main = document.querySelector('.main');
            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
    <script src="./../js/admin.js"></script>
</body>
</html>