<?php 

    $consulta = "SELECT * FROM menu";
    $menu = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores y guardado provicional de variables
    //Esto para que, en caso de error, el usuario no tenga que volver
    //a escribir todo desde 0 y para insertar en la base de datos.
    $mistakes = [];
    
    $platillo = '';
    $id_iest = '';
    $nombre = '';
    $hora = date('H:i',time() - 21500);
    $fecha = date('Y/m/d');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Limpiamos lo ingresado por el usuario para que no ingrese consultas de SQL
        $platillo = mysqli_real_escape_string( $db, $_POST['platillo'] );
        $id_iest = mysqli_real_escape_string( $db, $_POST['id_iest'] );
        $nombre = mysqli_real_escape_string( $db, $_POST['name'] );

        //Validaciones, todas en caso de que un campo quede vacío
        //Lo agregará a un arreglo de errores que después será mostrado
        if(!$platillo) {
            $mistakes[] = "Debes seleccionar un platillo";
        }

        if(!$id_iest) {
            $mistakes[] = "Debes ingresar el ID IEST del consumidor";
        }

        if(!$nombre) {
            $mistakes[] = "Debes ingresar el nombre del consumidor";
        }

        //Paso todas las validaciones (El arreglo de errores está vacío)
        //Por lo tanto no hay errores, pasá a esta fase.
        if(empty($mistakes)){
            //Tomar elementos del platillo seleccionado
            $query_platillo = "SELECT * FROM menu WHERE id = $platillo";
            $result_platillo = mysqli_query($db, $query_platillo);
            $platillo_seleccionado = mysqli_fetch_assoc($result_platillo);

            $platillo_name = $platillo_seleccionado['nombre'];
            $platillo_price = $platillo_seleccionado['precio'];
            $platillo_area = $platillo_seleccionado['area'];
            
            $cant = 1;
            
            //Inserta en la base de datos con este Query
            $query = "INSERT INTO pedidos (id_producto, nombre_platillo, cantidad, total, cliente, id_iest, hora, fecha, estado, area)
            VALUES ('$platillo', '$platillo_name', '$cant', '$platillo_price', '$nombre', '$id_iest', '$hora', '$fecha', 'En preparación', '$platillo_area') ";

            $result = mysqli_query($db, $query);

            // //Redireccionar en caso de todo correcto y 
            // //pasar un número para mostrar un mensaje
            if ($result) {
                header("Location: /admin/pedidos.php?result=2");
            }
        }
    }
?>