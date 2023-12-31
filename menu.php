<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['id-iest']){
        header('Location: index.php');
        exit();
    }
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

    <!--Animation-->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

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
            <a class="nav_link yellow" href="menu.php">Menú</a>
            <a class="nav_link" href="pedidos.php">Pedidos</a>
            <a class="nav_link" href="perfil.php">Perfil</a>
            <a class="nav_link" href="index.php?logout=1">Cerrar sesión</a>
        </nav>
        
    </header>

    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>

    <br>
    <div class="cards-container">

        <a href="platillos.php?area=Café" class="link_area">
            <div class="card product animate__animated animate__backInUp">
                <p>Menú de</p>
                <h1>Café</h1>
            </div>
        </a>

        <a href="platillos.php?area=Pérgola" class="link_area">
            <div class="card product animate__animated animate__backInUp">
                <p>Menú de</p>
                <h1>Pérgola</h1>
            </div>
        </a>

        <a href="platillos.php?area=Snacks" class="link_area">
            <div class="card product animate__animated animate__backInUp">
                <p>Menú de</p>
                <h1>Snacks</h1>
            </div>
        </a>

        <a href="platillos.php?area=Paninis" class="link_area">
            <div class="card product animate__animated animate__backInUp">
                <p>Menú de</p>
                <h1>Paninis</h1>
            </div>
        </a>

    </div>

    <script src="js/mobile-menu.js"></script>
</body>
</html>