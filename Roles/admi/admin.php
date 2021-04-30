

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./../../css/admin.css">
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

        <div class="cardBox">
            <div class="card">
                <div>
                    <div><img src="../../assets/senaf.jpg" alt=""> </div>
                    <div><p>Lorem ipsum dolor sit amet consectetur adipisicing s e consequuntur, architecto suscipit velit debitis.</p></div>
                </div>
            </div>
        

        
            <div class="card">
                <div>
                    <div><img src="../../assets/senaf.jpg" alt=""> </div>
                    <div><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis est qs nisi, earum sapiente cosuscipit velit debitis.</p></div>
                </div>
            </div>
        

        
            <div class="card">
                <div>
                    <div><img src="../../assets/senaf.jpg" alt=""> </div>
                    <div><p>Lorem ipsum dolor sit amet consectetur adipisicing els nisi, earum sapiente consequuntur, architecto suscipit velit debitis.</p></div>
                </div>
            </div>
        </div>


        <div class="cardBox2">
            <div class="card2">
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis neque blanditiis quae distinctio assumenda itaque dolorem delectus. A, aspernatur repudiandae? Assumenda, libero! Quae laboriosam sit mollitia cum expedita? Commodi, mollitia? Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus delectus, blanditiis aliquid magni nulla pariatur enim illo ratione non impedit debitis quos porro doloribus itaque? Placeat, mollitia. Exercitationem, eum nulla!</p>
                </div>
                <div><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim et labore necessitatibus, pariatur, debitis amet omnis maxime unde exercitationem repudiandae facere aperiam repellat optio, modi dignissimos adipisci consequatur beatae quia?</p></div>
                <div><img src="../../assets/sena.jpg" alt=""></div>
            </div>
        </div>
        
    
    
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
</body>
</html>