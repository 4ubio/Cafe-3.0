<?php 
    //Obtenemos el id del URL para poder realizar la consulta de que platillo editar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Validación en caso de que el usuario modifique el URL eliminando el ID
    if (!$id) {
        header('location: /admin/menu.php');
    }

    //Consultar la base de datos para obtener el platillo con el ID indicado en el URL
    $query1 = "SELECT * FROM menu WHERE id = $id";
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
    $hour_i = $platillo['hora_inicio'];
    $hour_f = $platillo['hora_fin'];
    $area = $platillo['area'];
    $category = $platillo['categoria'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Limpiamos lo ingresado por el usuario para que no ingrese consultas de SQL
        $name = mysqli_real_escape_string( $db, $_POST['name'] );
        $price = mysqli_real_escape_string( $db, $_POST['price'] );
        $desc = mysqli_real_escape_string( $db, $_POST['desc'] );
        $status = mysqli_real_escape_string( $db, $_POST['status'] );
        $time = mysqli_real_escape_string( $db, $_POST['time'] );
        $hour_i = mysqli_real_escape_string( $db, $_POST['hour_i'] );
        $hour_f = mysqli_real_escape_string( $db, $_POST['hour_f'] );
        $area = mysqli_real_escape_string( $db, $_POST['area'] );
        $category = mysqli_real_escape_string( $db, $_POST['category'] );

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

        if(!$hour_i) {
            $mistakes[] = "Debes añadir una hora de inicio para ofrecer el platillo";
        }

        if(!$hour_f) {
            $mistakes[] = "Debes añadir una hora de fin para ofrecer el platillo";
        }

        if(!$area) {
            $mistakes[] = "Debes añadir una area donde ofrecen este platillo";
        }

        if(!$category) {
            $mistakes[] = "Debes añadir una categoría donde se encuentra este platillo";
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
                    nombre = '$name',
                    foto = '$picName',
                    precio = $price,
                    descripcion = '$desc',
                    estado = '$status',
                    tiempo = $time,
                    hora_inicio = '$hour_i',
                    hora_fin = '$hour_f',
                    categoria = '$category',
                    area = '$area'
                    WHERE id = $id";

            $result2 = mysqli_query($db, $query2);

            //Redireccionar en caso de todo correcto y 
            //pasar un número para mostrar un mensaje
            if ($result2) {
                header("Location: /admin/menu.php?result=2");
            }
        }
    }
?>