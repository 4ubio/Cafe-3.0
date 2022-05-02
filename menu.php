<?php 

    //Importar la conexion
    require 'includes/config/database.php';
    $db = conectardb();

    //Escribir el query y obtener el resultado
    $query = "SELECT * FROM menu ORDER BY nombre ASC";
    $resultQ1 = mysqli_query($db, $query);

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
            <a class="nav_link" href="">Cerrar sesión</a>
        </nav>
        
    </header>

    <h1>Bienvenido, Sebastián</h1>

    <div class="container2">

        <?php while($platillo = mysqli_fetch_assoc($resultQ1)) : ?> 
            <a href="entrada.php?id=<?php echo $platillo['id']; ?>" class="link_product">
                <div class="product animate__animated animate__backInUp">
                    <img src="/food/<?php echo $platillo['foto'] ?>" alt="hamburguesa" class="food_img">
                    <h2><?php echo $platillo['nombre'] ?></h2>
                </div>
            </a>
        <?php endwhile; ?>

    </div>

    <script src="js/mobile-menu.js"></script>
</body>
</html>