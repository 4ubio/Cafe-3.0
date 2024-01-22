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

    <?php if(intval($payed) === 2) : ?>
        <p class="error__alert">Pago no completado o cancelado.</p>
    <?php endif; ?>

    <div class="container">

        <div class="confirm_info">
            <img src="/food/<?php echo $platillo['foto'] ?>" alt="food" class="food_info_img_confirm">

            <div class="info">
                <h2>Datos del pedido: </h2>
                <p class="no_magin_top"> <b> <?php echo $platillo['nombre'] ?> </b> </p>
                <p class="no_magin_top">ID Producto: <b><span id="id"><?php echo $id ?></span></b></p>
                <p class="no_magin_top">Recoger en: <span> <b><?php echo $platillo['area'] ?></b> </span></p>
                <p class="no_magin_top">Cantidad: <b><span id="cant"><?php echo $cant ?></span></b> </p>
                <p class="no_magin_top">Total: <b>$<span id="total"><?php echo $total ?></span> MXN</b></p>
                <p class="no_magin_top">Tiempo de preparación estimado: <span> <b><?php echo $tiempo ?> minutos</b> </span></p>

                <br>

                <h2 >Datos del consumidor:</h2>
                <p class="no_magin_top">Nombre: <span> <b> <?php echo $nombre; ?> </b> </span> </p>
                <p class="no_magin_top">ID IEST: <span><b><?php echo $id_iest ; ?></b></span></p>
                <p class="no_magin_top">Correo electronico: <span><b><?php echo $email ; ?></b></span></p>
                
                <br>

                <h2 >Datos de pago:</h2>
                <p class="no_magin_top">Forma de pago: <span> <b> Efectivo al entregar </b> </span> </p>
                
                <br>

                <?php if($_SESSION['estado'] !== 'Bloqueado') : ?>

                    <!-- 
                        Con este if, nos aseguramos de estar dentro del horario de servicio
                     -->
                    <?php if($now >= $hora_inicio and $now < $hora_fin) : ?>

                        <!--
                            Con este if, en caso de que el estado guardado del platillo
                            sea Disponible, mostrara el formulario para confirmar, en caso contrario, 
                            no mostrará nada.
                        -->
                        <?php if($platillo['estado'] === 'Disponible') : ?>
                        <form method="POST" enctype="multipart/form-data" class="product_form">
                            <div id="paypal-payment-button"></div>
                        </form>
                        <?php endif; ?>

                    <?php else: ?>
                        <p class="no_magin_top"><b>Este platillo no esta disponible dentro de este horario. Por favor, revisa más tarde.</b></p>
                    <?php endif; ?>
                    
                <?php else : ?>
                    <p class="no_magin_top"><b>Actualmente te encuentras bloqueado de la plataforma por mal uso. Si crees que se trata de un error, cierra y vuelve a iniciar sesión.</b></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="js/mobile-menu.js"></script>
    
    <!-- PayPal -->
    <script src="https://www.paypal.com/sdk/js?client-id=AZcDa4UNI086TfJnj4LA_10KsZBFMcWBnzJ1qAagc_m2OLZ6828gzCG4lhDZQNFf6Q4l2so4fVHsjXOS&currency=MXN&disable-funding=credit,card"></script>
    <script src="js/paypal.js"></script>
</body>
</html>