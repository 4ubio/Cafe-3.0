<?php 
    
    
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
                <li><a class="nav-li" href="cerrarsesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </aside>

    <main class="main-content">
        <div class="title">
            <h1>Pendiente</h1>
        </div>
        
        <div class="table-container">
            <table class="table-menu">
                <tr class="headers">
                    <th># de seguimiento</th>
                    <th>pedido</th>
                    <th>cantidad</th>
                    <th>ID Alumno</th>
                    <th>Hora de pedido</th>
                    <th>Estado</th> 
                </tr>
                    
                <tr>
                    <td>0019</td>
                    <td>Boneless</td>
                    <td>2</td>
                    <td>19327</td>
                    <td>07:50</td>
                    <td>
                        <div class="custom-select">
                            <select name="" id="" class="field select pedido">
                                <option value="">Pendiente</option>
                                <option value="">En preparación</option>
                                <option value="">Listo para entrega</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>0020</td>
                    <td>Hamburguesa</td>
                    <td>1</td>
                    <td>19506</td>
                    <td>09:20</td>
                    <td>
                        <div class="custom-select">
                            <select name="" id="" class="field select pedido">
                                <option value="">Pendiente</option>
                                <option value="">En preparación</option>
                                <option value="">Listo para entrega</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>0021</td>
                    <td>Enchiladas</td>
                    <td>1</td>
                    <td>$20081</td>
                    <td>14:30</td>
                    <td>
                        <div class="custom-select">
                            <select name="" id="" class="field select pedido">
                                <option value="">Pendiente</option>
                                <option value="">En preparación</option>
                                <option value="">Listo para entrega</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
       
    </main>

    <!--
        Aqui se imprime la fecha en formato:
        Weekday Monthday, Month, Year
    -->

    <footer>
        <p><?php echo $today['weekday'] . " " . $today['mday'] . ", " . $today['month'] . ", " . $today['year']?></p>
    </footer>
</body>
</html>