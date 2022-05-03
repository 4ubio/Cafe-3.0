<?php 
    //Obtenemos el id del URL para poder realizar la consulta de que platillo editar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Validación en caso de que el usuario modifique el URL eliminando el ID
    if (!$id) {
        header('location: /admin/menu.php');
    }

    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectardb();

    //Consultar la base de datos para obtener el platillo con el ID indicado en el URL
    $query1 = "SELECT * FROM menu WHERE id = ${id}";
    $result1 = mysqli_query($db, $query1);

    //Validación en caso de que el usuario modifique el URL por un ID no existente
    if (!$result1->num_rows) {
        header('location: /admin/menu.php');
    }

    //Guardamos la fila del platillo deseado
    $platillo = mysqli_fetch_assoc($result1);

    //Arreglo con mensajes de errores y guardado provicional de variables
    //Para poder mostrar al usuario lo que ya tiene guardado en cada campo
    //del platillo que desea modificar.
    $mistakes = [];
    $name = $platillo['nombre'];
    $price = $platillo['precio'];
    $desc = $platillo['descripcion'];
    $status = $platillo['estado'];
    $time = $platillo['tiempo'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Limpiamos lo ingresado por el usuario para que no ingrese consultas de SQL
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $price = mysqli_real_escape_string( $db, $_POST['price'] );
        $desc = mysqli_real_escape_string( $db, $_POST['desc'] );
        $status = mysqli_real_escape_string( $db, $_POST['status'] );
        $time = mysqli_real_escape_string( $db, $_POST['time'] );

        //Asignamos la imagen a una variable
        $img = $_FILES['image'];

        //Validaciones, todas en caso de que un campo quede vacío
        //Lo agregará a un arreglo de errores que después será mostrado
        if(!$name) {
            $mistakes[] = "Debes añadir un nombre al platillo";
        }

        if(!$price) {
            $mistakes[] = "Debes añadir un precio al platillo";
        }

        if(!$desc) {
            $mistakes[] = "Debes añadir una descripción al platillo";
        }

        if(!$time) {
            $mistakes[] = "Debes añadir un tiempo de preparación al platillo";
        }

        //Paso todas las validaciones (El arreglo de errores está vacío)
        //Por lo tanto no hay errores, pasá a esta fase.
        if(empty($mistakes)){

            //Crear carpeta en caso de no existir para guardar las imagenes
            $folder = '../food/';

            if (!is_dir($folder)) {
                mkdir($folder);
            }

            $picName = '';

            //Cambio de archivos, primero eliminamos la foto ya subida del platillo en
            //caso de haber seleccionado una nueva
            if ($img['name']) {
                unlink($folder . $platillo['foto']);

                //Volvemos a generar un nombre unico a la imagen
                $picName = md5(uniqid(rand(), true)) . ".jpg";

                //Subimos la nueva imagen
                move_uploaded_file($img['tmp_name'], $folder . $picName);
            } else {
                //En caso de no haber seleccionado nueva foto, mantendrá la ya existente
                $picName = $platillo['foto'];
            }

            //Actualiza en la base de datos
            $query2 = "UPDATE menu SET 
                    nombre = '${name}',
                    foto = '${picName}',
                    precio = ${price},
                    descripcion = '${desc}',
                    estado = '${status}',
                    tiempo = ${time}
                    WHERE id = ${id}";

            $result2 = mysqli_query($db, $query2);

            //Redireccionar en caso de todo correcto y 
            //pasar un número para mostrar un mensaje
            if ($result2) {
                header("Location: /admin/menu.php?result=2");
            }
        }
    }

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

        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>

        <div class="title">
            <h1>Editar Platillo</h1>
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
            otra vez en cada campo y pueda recordar lo
            que ya tiene ingresado y desea modificar.
        -->
        <div class="form">
            <form class="new-form" method="POST" enctype="multipart/form-data">
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
                    <input id="price" autocomplete="off" class="field" type="number" name="price" value="<?php echo $price; ?>">
                </div>

                <div class="form-comp">
                    <label for="desc">Descripción:</label>
                    <textarea id="desc" autocomplete="off" class="field textarea" type="text" name="desc"><?php echo $desc; ?></textarea>
                </div>

                <div class="form-comp">
                    <label for="status">Estado:</label>
                    <div class="custom-select">
                        <select id="status" class="field select" name="status">
                            <option value="Disponible">Disponible</option>
                            <option value="No Disponible">No Disponible</option>
                        </select>
                    </div>
                    
                </div>

                <div class="form-comp">
                    <label for="time">Tiempo:</label>
                    <input id="time" autocomplete="off" class="field" type="number" name="time" value="<?php echo $time; ?>">
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