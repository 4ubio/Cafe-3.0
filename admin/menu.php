<?php 
    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectardb();

    //Escribir el query y obtener el resultado
    $query = "SELECT * FROM menu ORDER BY id ASC";
    $resultQ1 = mysqli_query($db, $query);

    //Muestra mensaje condicional
    $resultGet = $_GET['result'] ?? null;

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
                <li><a class="nav-li" href="pedidos.php">Pedidos</a></li>
                <li><a class="nav-li" href="usuarios.php">Usuarios</a></li>
                <li><a class="nav-li" href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="title">
            <h1>Platillos</h1>
            <a href="platillo.php"><button class="btn">Crear Platillo</button></a>
        </div>

        <?php if(intval($resultGet) === 1) : ?>
            <p class="success__alert">Platillo registrado correctamente</p>
        <?php elseif(intval($resultGet) === 2) : ?>
            <p class="success__alert">Platillo actualizado correctamente</p>
        <?php endif; ?>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Foto</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Tiempo</th>
                    <th>Acciones</th> 
                </tr>
                    
                <?php while($platillo = mysqli_fetch_assoc($resultQ1)) :  
                    if ($platillo['estado']==='Disponible') {
                        $class='disponible';
                    } else {
                        $class='no-disponible';
                    }
                ?>
                <tr>
                    <td><?php echo $platillo['id'] ?></td>
                    <td><?php echo $platillo['nombre'] ?></td>
                    <td><img class="table-img" src="/food/<?php echo $platillo['foto'] ?>" alt=""></td>
                    <td>$ <?php echo $platillo['precio'] ?></td>
                    <td><?php echo $platillo['descripcion'] ?></td>
                    <td class="<?php echo $class ?>"><?php echo $platillo['estado'] ?></td>
                    <td><?php echo $platillo['tiempo'] ?></td>
                    <td>
                        <a href="editarplatillo.php?id=<?php echo $platillo['id']; ?>"><button class="btn-editar">Editar</button></a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </table>
        </div>
       
    </main>

    <footer>
        <p><?php echo $today['weekday'] . " " . $today['mday'] . ", " . $today['month'] . ", " . $today['year']?></p>
    </footer>
</body>
</html>