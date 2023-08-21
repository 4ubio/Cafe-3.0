<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['id-iest']){
        header('Location: index.php');
        exit();
    }
    
    //Importar el controlado
    require_once 'controllers/confirmarPedidoController.php';
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
            <a class="nav_link yellow" href="menu.php">Menú</a>
            <a class="nav_link" href="pedidos.php">Pedidos</a>
            <a class="nav_link" href="perfil.php">Perfil</a>
            <a class="nav_link" href="index.php?logout=1">Cerrar sesión</a>
        </nav>
        
    </header>

    <h1>Confirmar pedido</h1>

    <div class="container">

        <div class="confirm_info">
            <img src="/food/<?php echo $platillo['foto'] ?>" alt="food" class="food_info_img_confirm">

            <div class="info">
                <h2>Datos del pedido: </h2>
                <p class="no_magin_top"> <b> <?php echo $platillo['nombre'] ?> </b> </p>
                <p class="no_magin_top">Cantidad: <span> <b><?php echo $cant ?></b> </span> </p>
                <p class="no_magin_top">Total: <span> <b>$<?php echo $total ?> MXN</b> </span></p>
                <p class="no_magin_top">Tiempo de preparación: <span> <b><?php echo $platillo['tiempo'] ?> minutos</b> </span></p>

                <br>

                <h2 >Datos del consumidor:</h2>
                <p class="no_magin_top">Nombre: <span> <b> <?php echo $nombre; ?> </b> </span> </p>
                <p class="no_magin_top">ID IEST: <span><b><?php echo $id_iest ; ?></b></span></p>
                <p class="no_magin_top">Correo electronico: <span><b><?php echo $email ; ?></b></span></p>
                
                <br>

                <h2 >Datos de pago:</h2>
                <p class="no_magin_top">Forma de pago: <span> <b> Efectivo al entregar </b> </span> </p>
                
                <br>

                <!--
                    Con este if, en caso de que el estado guardado del platillo
                    sea Disponible, mostrara el formulario para confirmar, en caso contrario, 
                    no mostrará nada.
                -->
                
                <?php if($platillo['estado'] === 'Disponible') : ?>
                <form method="POST" enctype="multipart/form-data" class="product_form">
                    <div class="">
                        <input type="submit" value="Confirmar" class="submit w-100">
                    </div>
                </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="js/mobile-menu.js"></script>
</body>
</html>