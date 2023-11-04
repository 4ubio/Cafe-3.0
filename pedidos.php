<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['id-iest']){
        header('Location: index.php');
        exit();
    }

    //Importar el controlador
    require_once 'controllers/pedidosController.php';
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
            <a class="nav_link" href="index.php?logout=1">Cerrar sesión</a>
        </nav>
        
    </header>

    <?php if(intval($resultGet) === 1) : ?>
        <p class="success__alert">Pedido registrado correctamente.</p>
    <?php endif; ?>

    <h1>Tus pedidos</h1>

    <?php foreach($result as $pedido):
    
        //Obtener progreso
        if ($pedido['estado'] === 'En preparación') {
            $progress = 20;
        } else if ($pedido['estado'] === 'Listo para recoger') {
            $progress = 60;
        } else if ($pedido['estado'] === 'Entregado') {
            $progress = 100;
        }  

        //Obtener foto
        $query = "SELECT * FROM menu WHERE id = $pedido[id_producto]";
        $result = mysqli_query($db, $query);

        //Guardamos la fila del platillo deseado
        $platillo = mysqli_fetch_assoc($result);

        //Guardamos la foto
        $foto = $platillo['foto']
    ?> 
        <div class="container food_order">            
            <div class="product_info container_info">
                <img src="food/<?php echo $foto?>" alt="food" class="food_info_img">
                <div class="info">
                    <h2 class="title">No. <?php echo $pedido['id']; ?></h2>
                    <p class="no_magin_top"><b><?php echo $pedido['nombre_platillo']; ?></b></p>
                    <p class="no_magin_top">Recoger en: <span> <b><?php echo $pedido['area']; ?></b> </span></p>
                    <p class="no_magin_top">Fecha de pedido: <span> <b><?php echo $pedido['fecha']; ?></b> </span></p>
                    <p class="no_magin_top">Hora de pedido: <span> <b><?php echo $pedido['hora']; ?></b> </span></p>
                    <p class="no_magin_top">Total: <span> <b>$<?php echo $pedido['total']; ?> MXN</b> </span></p>
                </div>
            </div>
            
            <div class="div_progress">
                <progress class="progress_bar" max="100" value="<?php echo $progress ?>"></progress>
                <div class="progress_text">
                    <p>En preparación</p>
                    <p>Listo para recoger</p>
                    <p>Entregado</p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script src="js/mobile-menu.js"></script>
</body>
</html>