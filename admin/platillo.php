<?php 
    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectardb();

    //Arreglo con mensajes de errores y guardado provicional de variables
    //Esto para que, en caso de error, el usuario no tenga que volver
    //a escribir todo desde 0 y para insertar en la base de datos.
    $mistakes = [];
    $name = '';
    $price = '';
    $desc = '';
    $status = '';
    $time = '';

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

        if (!$img['name'] || $img['error']) {
            $mistakes[] = "La foto del platillo es obligatoria";
        }

        //Paso todas las validaciones (El arreglo de errores está vacío)
        //Por lo tanto no hay errores, pasá a esta fase.
        if(empty($mistakes)){
            //Crear carpeta en caso de no existir para guardar las imagenes
            $folder = '../food/';

            if (!is_dir($folder)) {
                mkdir($folder);
            }

            //Generar un nombre unico a la imagen
            $picName = md5(uniqid(rand(), true)) . ".jpg";

            //Subir la imagen a la carpeta de fotos
            move_uploaded_file($img['tmp_name'], $folder . $picName);

            //Inserta en la base de datos con este Query
            $query = "INSERT INTO menu (nombre, foto, precio, descripcion, estado, tiempo)
            VALUES ('$name', '$picName', '$price', '$desc', '$status', '$time') ";

            $result = mysqli_query($db, $query);

            //Redireccionar en caso de todo correcto y 
            //pasar un número para mostrar un mensaje
            if ($result) {
                header("Location: /admin/menu.php?result=1");
            }
        }
    }
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
                    <input type="submit" value="Crear" class="btn guardar"></input>
                </div>
            </form>
        </div>
       
    </main>
</body>
</html>