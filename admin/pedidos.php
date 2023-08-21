<?php 
    //Importar controlador de autenticación
    require_once 'controllers/authController.php';

    //Verificar si existe una sesión iniciada
    if(!$_SESSION['admin']){
        header('Location: index.php');
        exit();
    }

    //Importar controlador
    require_once 'controllers/pedidosController.php';
    
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
                <li><a class="nav-li active" href="pedidos.php">Pedidos</a></li>
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

        <?php if(intval($resultGet) === 1) : ?>
            <p class="success__alert">Pedido actualizado correctamente</p>
        <?php endif; ?>

        <div class="title">
            <h1>En preparación</h1>
        </div>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th># de seguimiento</th>
                    <th>Platillo</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>ID Alumno</th>
                    <th>Hora de pedido</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th> 
                    <th>Editar</th> 
                </tr>

                <?php while($pedido = mysqli_fetch_assoc($resultQ1)) : ?> 
                <tr>
                    <td><?php echo $pedido['id'] ?></td>
                    <td><?php echo $pedido['nombre_platillo'] ?></td>
                    <td><?php echo $pedido['cantidad'] ?></td>
                    <td>$<?php echo $pedido['total'] ?></td>
                    <td><?php echo $pedido['cliente'] ?></td>
                    <td><?php echo $pedido['id_iest'] ?></td>
                    <td><?php echo $pedido['hora'] ?></td>
                    <td><?php echo $pedido['fecha'] ?></td>
                    <td><?php echo $pedido['estado'] ?></td>
                    <td>
                        <a href="editarpedido.php?id=<?php echo $pedido['id']; ?>"><button class="btn-editar">Editar</button></a>
                    </td>
                </tr>

                <?php endwhile; ?>

            </table>
        </div>

        <div class="title">
            <h1>Listo para recoger</h1>
        </div>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th># de seguimiento</th>
                    <th>Platillo</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>ID Alumno</th>
                    <th>Hora de pedido</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th> 
                    <th>Editar</th> 
                </tr>

                <?php while($pedido = mysqli_fetch_assoc($resultQ2)) : ?> 
                <tr>
                    <td><?php echo $pedido['id'] ?></td>
                    <td><?php echo $pedido['nombre_platillo'] ?></td>
                    <td><?php echo $pedido['cantidad'] ?></td>
                    <td>$<?php echo $pedido['total'] ?></td>
                    <td><?php echo $pedido['cliente'] ?></td>
                    <td><?php echo $pedido['id_iest'] ?></td>
                    <td><?php echo $pedido['hora'] ?></td>
                    <td><?php echo $pedido['fecha'] ?></td>
                    <td><?php echo $pedido['estado'] ?></td>
                    <td>
                        <a href="editarpedido.php?id=<?php echo $pedido['id']; ?>"><button class="btn-editar">Editar</button></a>
                    </td>
                </tr>

                <?php endwhile; ?>

            </table>
        </div>

        <div class="title">
            <h1>Entregado</h1>
        </div>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th># de seguimiento</th>
                    <th>Platillo</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>ID Alumno</th>
                    <th>Hora de pedido</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th> 
                    <th>Editar</th> 
                </tr>

                <?php while($pedido = mysqli_fetch_assoc($resultQ3)) : ?> 
                <tr>
                    <td><?php echo $pedido['id'] ?></td>
                    <td><?php echo $pedido['nombre_platillo'] ?></td>
                    <td><?php echo $pedido['cantidad'] ?></td>
                    <td>$<?php echo $pedido['total'] ?></td>
                    <td><?php echo $pedido['cliente'] ?></td>
                    <td><?php echo $pedido['id_iest'] ?></td>
                    <td><?php echo $pedido['hora'] ?></td>
                    <td><?php echo $pedido['fecha'] ?></td>
                    <td><?php echo $pedido['estado'] ?></td>
                    <td>
                        <a href="editarpedido.php?id=<?php echo $pedido['id']; ?>"><button class="btn-editar">Editar</button></a>
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