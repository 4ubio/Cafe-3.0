<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    //Importar controlador de menu
    require_once 'controllers/usuariosController.php';
    
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
            <h1>Usuarios</h1>
            <a href="nuevousuario.php"><button class="btn">Crear Usuario</button></a>
        </div>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th>ID IEST</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Acciones</th> 
                </tr>

                <?php while($user = mysqli_fetch_assoc($resultQ1)) :?> 
                    <tr>
                        <td><?php echo $user['id_iest'] ?></td>
                        <td><?php echo $user['nombre'] ?></td>
                        <td><?php echo $user['apellido'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <a href="editarusuario.php"><button class="btn-editar">Editar</button></a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>
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