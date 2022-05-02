<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,600&display=swap" rel="stylesheet">

    <!--Normalize-->
    <link rel="preload" href="styles/normalize.css" as="style">
    <link rel="stylesheet" href="styles/normalize.css">

    <!--Styles-->
    <link rel="preload" href="styles/styles.css" as="style">
    <link rel="stylesheet" href="styles/styles.css">

    <title>Cafe 3.0</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <img src="assets/Cafe2.png" alt="logo" class="logo_img">
        </div>

        <div class="mobile-menu">
            <img src="assets/barras.png" alt="icono_menu_responsive" class="ham_menu">
        </div>

        <nav class="navigation">
            <a class="nav_link" href="menu.php">Menú</a>
            <a class="nav_link yellow" href="pedidos.php">Pedidos</a>
            <a class="nav_link" href="perfil.php">Perfil</a>
            <a class="nav_link" href="">Cerrar sesión</a>
        </nav>
        
    </header>

    <h1>Tus pedidos</h1>

    <div class="container food_order">

        <div class="product_info container_info">
            <img src="food/chilaquiles.jpeg" alt="food" class="food_info_img">
            <div class="info">
                <h2 class="title">No. 12345</h2>
                <p class="no_magin_top"><b>Chilaquiles de pollo</b></p>
                <p class="no_magin_top">Fecha de pedido: <span> <b>20/04/2022</b> </span></p>
                <p class="no_magin_top">Hora de pedido: <span> <b>4:20 PM</b> </span></p>
                <p class="no_magin_top">Total: <span> <b>$65 MXN</b> </span></p>
            </div>
        </div>
        
        <div class="div_progress">
            <progress class="progress_bar" max="100" value="20"></progress>
            <div class="progress_text">
                <p>En preparación</p>
                <p>Listo para recoger</p>
                <p>Entregado</p>
            </div>
        </div>

    </div>

    <div class="container food_order">

        <div class="product_info container_info">
            <img src="food/boneless.jpeg" alt="food" class="food_info_img">
            <div class="info">
                <h2 class="title">No. 12346</h2>
                <p class="no_magin_top"><b>Boneless BBQ</b></p>
                <p class="no_magin_top">Fecha de pedido: <span> <b>20/04/2022</b> </span></p>
                <p class="no_magin_top">Hora de pedido: <span> <b>4:20 PM</b> </span></p>
                <p class="no_magin_top">Total: <span> <b>$80 MXN</b> </span></p>
            </div>
        </div>
        
        <div class="div_progress">
            <progress class="progress_bar" max="100" value="60"></progress>
            <div class="progress_text">
                <p>En preparación</p>
                <p>Listo para recoger</p>
                <p>Entregado</p>
            </div>
        </div>

    </div>

    <script src="js/mobile-menu.js"></script>
</body>
</html>