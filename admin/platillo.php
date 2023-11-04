<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    //Importar controlador creador de platillos
    require_once 'controllers/nuevoPlatilloController.php';

    //Fecha actual
    $today = getdate();
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
    
    <!--Styles-->
    <link rel="stylesheet" href="styles/style.css">
    
    <title>Admin - Cafe3.0</title>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="/assets/Cafe2.png" alt="logo">
            <h1>Administración</h1>
        </div>

        <div class="sidebar-nav">
            <ul class="navigation">
                <li><a class="nav-li" href="panel.php">Panel de control</a></li>
                <li><a class="nav-li active" href="menu.php">Menú</a></li>
                <li><a class="nav-li" href="crearpedido.php">Crear pedido</a></li>
                <li><a class="nav-li" href="pedidos.php">Pedidos</a></li>
                <li><a class="nav-li" href="usuarios.php">Usuarios</a></li>
                <li><a class="nav-li" href="index.php?logout=1">Cerrar sesión</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">

        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <div class="title">
            <h1>Nuevo Platillo</h1>
        </div>


        <!--Mostrar todos los errores dentro del arreglo-->
        <?php foreach($mistakes as $mistake) : ?>
            <div class="error__alert">
                <?php echo $mistake ?>
            </div>
        <?php endforeach; ?>
        
        <!--
            Los value son para que el usuario, en
            caso de error, no tengan que escribir todo
            otra vez en cada campo
        -->

        <div class="form">
            <form class="new-form" action="/admin/platillo.php" method="POST" enctype="multipart/form-data">
                <div class="form-comp">
                    <label for="name">Nombre:</label>
                    <input id="name" autocomplete="off" class="field" type="text" name="name" value="<?php echo $name; ?>">
                </div>

                <div class="form-comp">
                    <label for="image">Foto:</label>
                    <input id="image" type="file" accept="image/jpeg, image/png" class="field" name="image">
                </div>

                <div class="form-comp">
                    <label for="price">Precio:</label>
                    <input id="price" autocomplete="off" class="field" type="number" name="price" step=".01" value="<?php echo $price; ?>">
                </div>

                <div class="form-comp">
                    <label for="desc">Descripción:</label>
                    <textarea id="desc" autocomplete="off" class="field textarea" type="text" name="desc"><?php echo $desc; ?></textarea>
                </div>

                <div class="form-comp">
                    <label for="status">Estado:</label>
                    <div class="custom-select">
                        <select id="status" class="field select" name="status">
                            <option <?php if ($status === 'Disponible') echo 'selected' ?> value="Disponible">Disponible</option>
                            <option <?php if ($status === 'No Disponible') echo 'selected' ?> value="No Disponible">No Disponible</option>
                        </select>
                    </div>
                </div>

                <div class="form-comp">
                    <label for="time">Tiempo:</label>
                    <input id="time" autocomplete="off" class="field" type="number" name="time" value="<?php echo $time; ?>">
                </div>

                <div class="form-comp">
                    <label for="hour_i">Hora inicio:</label>
                    <input id="hour_i" autocomplete="off" class="field" type="time" name="hour_i" value="<?php echo $hour_i; ?>">
                </div>

                <div class="form-comp">
                    <label for="hour_f">Hora fin:</label>
                    <input id="hour_f" autocomplete="off" class="field" type="time" name="hour_f" value="<?php echo $hour_f; ?>">
                </div>

                <div class="form-comp">
                    <label for="area">Área:</label>
                    <div class="custom-select">
                        <select id="area" class="field select" name="area">
                            <option value="">-- Seleccionar --</option>
                            <option <?php if ($area === 'Café') echo 'selected' ?> value="Café">Café</option>
                            <option <?php if ($area === 'Pérgola') echo 'selected' ?> value="Pérgola">Pérgola</option>
                            <option <?php if ($area === 'Snacks') echo 'selected' ?> value="Snacks">Snacks</option>
                            <option <?php if ($area === 'Paninis') echo 'selected' ?> value="Paninis">Paninis</option>
                        </select>
                    </div>
                </div>

                <div class="form-comp">
                    <label for="category">Categoría:</label>
                    <div class="custom-select">
                        <select id="category" class="field select" name="category">
                            <option value="">-- Seleccionar --</option>
                            <option <?php if ($category === 'Desayunos') echo 'selected' ?> value="Desayunos">Desayunos</option>
                            <option <?php if ($category === 'Saludables') echo 'selected' ?> value="Saludables">Saludables</option>
                            <option <?php if ($category === 'Mexicana') echo 'selected' ?> value="Mexicana">Mexicana</option>
                            <option <?php if ($category === 'Rápida') echo 'selected' ?> value="Rápida">Comida Rápida</option>
                            <option <?php if ($category === 'Bebidas') echo 'selected' ?> value="Bebidas">Bebidas</option>
                        </select>
                    </div>
                </div>

                <div class="form-comp submit">
                    <input type="submit" value="Crear" class="btn guardar"></input>
                </div>
            </form>
        </div>
       
    </main>

    <script src="../js/admin.js"></script>

    <!--
        Aqui se imprime la fecha en formato:
        Weekday Monthday, Month, Year
    -->

    <footer>
        <p><?php echo $today['weekday'] . " " . $today['mday'] . ", " . $today['month'] . ", " . $today['year']?></p>
    </footer>
</body>
</html>