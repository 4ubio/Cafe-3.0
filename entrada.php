<?php 
    //Obtenemos el id del URL para poder realizar la consulta de que platillo mostrar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Validación en caso de que el usuario modifique el URL eliminando el ID
    if (!$id) {
        header('location: /menu.php');
    }

    //Importar la conexion
    require 'includes/config/database.php';
    $db = conectardb();

    //Consultar la base de datos para obtener el platillo con el ID indicado en el URL
    $query = "SELECT * FROM menu WHERE id = ${id}";
    $result = mysqli_query($db, $query);

    //Validación en caso de que el usuario modifique el URL por un ID no existente
    if (!$result->num_rows) {
        header('location: /menu.php');
    }

    //Guardamos la fila del platillo deseado
    $platillo = mysqli_fetch_assoc($result);
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

    <h1><?php echo $platillo['nombre'] ?></h1>

    <div class="container">

        <div class="product_info">
            <img src="/food/<?php echo $platillo['foto'] ?>" alt="food" class="food_info_img">

            <div class="info">
                <p class="no_magin_top"><?php echo $platillo['descripcion'] ?></p>
                <p class="no_magin_top">Precio: <span> <b>$<?php echo $platillo['precio'] ?></b> </span></p>
                <p class="no_magin_top">Tiempo de preparación: <span> <b><?php echo $platillo['tiempo'] ?> minutos</b> </span></p>
                <p class="no_magin_top">Estado: <span> <b><?php echo $platillo['estado'] ?></b> </span></p>
                
                <!--
                    Con este if, en caso de que el estado guardado del platillo
                    sea Disponible, mostrara el formulario para seleccionar
                    cantidad y el boton de pedir, en caso contrario, no mostrará
                    nada.
                -->
                
                <?php if($platillo['estado'] === 'Disponible') : ?>
                <form method="" action="" class="product_form" novalidate>
                    <div class="container3">
                        <label>Cantidad: </label>
                        <select name="" id="" class="select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <br>

                    <div class="">
                        <input type="submit" value="Seleccionar" class="submit w-100">
                    </div>
                </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="js/mobile-menu.js"></script>
</body>
</html>