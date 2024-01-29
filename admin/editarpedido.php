<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    //Importar controlador creador de platillos
    require_once 'controllers/editarPedidosController.php';

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
                <li><a class="nav-li" href="menu.php">Menú</a></li>
                <li><a class="nav-li" href="crearpedido.php">Crear pedido</a></li>
                <li><a class="nav-li active" href="pedidos.php">Pedidos</a></li>
                <li><a class="nav-li" href="norecogidos.php">No recogidos</a></li>
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
            <h1>Editar Pedido</h1>
        </div>

        <div class="form">
            <form class="new-form" method="POST" enctype="multipart/form-data">
                <div class="form-comp">
                    <label for="name">ID pedido:</label>
                    <p><b><?php echo $pedido['id'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">Platillo:</label>
                    <p> <b><?php echo $pedido['nombre_platillo'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">Área:</label>
                    <p> <b><?php echo $pedido['area'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">Cantidad:</label>
                    <p><b><?php echo $pedido['cantidad'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">Total:</label>
                    <p>$<b><?php echo $pedido['total'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">Cliente:</label>
                    <p><b><?php echo $pedido['cliente'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="name">ID IEST:</label>
                    <p><b><?php echo $pedido['id_iest'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="status">Estado:</label>
                    <div class="custom-select">
                        <select id="status" class="field select" name="status">
                            <option <?php if ($pedido['estado'] === 'En preparación') echo 'selected' ?> value="En preparación">En preparación</option>
                            <option <?php if ($pedido['estado'] === 'Listo para recoger') echo 'selected' ?> value="Listo para recoger">Listo para recoger</option>
                            <option <?php if ($pedido['estado'] === 'Entregado') echo 'selected' ?> value="Entregado">Entregado</option>
                        </select>
                    </div>
                    
                </div>

                <div class="form-comp submit">
                    <input type="submit" value="Actualizar" class="btn guardar"></input>
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