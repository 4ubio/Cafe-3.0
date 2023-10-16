<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    //Importar controlador de menu
    require_once 'controllers/editarUsuarioController.php';
    
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
                <li><a class="nav-li" href="pedidos.php">Pedidos</a></li>
                <li><a class="nav-li active" href="usuarios.php">Usuarios</a></li>
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
            <h1>Editar Usuario</h1>
        </div>

        <div class="form">
            <form class="new-form user" method="POST">
                <div class="form-comp">
                    <label for="">Nombre:</label>
                    <p><b><?php echo $user['nombre'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="">Apellidos:</label>
                    <p><b><?php echo $user['apellido'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="">ID IEST:</label>
                    <p><b><?php echo $user['id_iest'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="">Estado:</label>
                    <p><b><?php echo $user['estado'] ?></b></p>
                </div>

                <div class="form-comp">
                    <label for="estado">Editar estado:</label>
                    <div class="custom-select">
                        <select id="estado" class="field select" name="estado">
                            <option value="Activo">Activo</option>
                            <option value="Bloqueado">Bloqueado</option>
                        </select>
                    </div>
                </div>

                <div class="form-comp submit">
                    <button class="btn guardar">Guardar</button>
                </div>
            </form>
        </div>
       
    </main>

    <script src="../js/admin.js"></script>

    <footer>
        <p><?php echo $today['weekday'] . " " . $today['mday'] . ", " . $today['month'] . ", " . $today['year']?></p>
    </footer>
</body>
</html>