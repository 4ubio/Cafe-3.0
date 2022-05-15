<?php 
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