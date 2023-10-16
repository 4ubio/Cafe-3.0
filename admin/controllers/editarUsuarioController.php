<?php
    //Obtenemos el id del URL para poder realizar la consulta de que usuario editar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Validación en caso de que el usuario modifique el URL eliminando el ID
    if (!$id) {
        header('location: /admin/usuarios.php');
    }

    //Consultar la base de datos para obtener el usuario con el ID indicado en el URL
    $query1 = "SELECT * FROM usuarios WHERE id_iest = $id";
    $resultQ1 = mysqli_query($db, $query1);

    //Validación en caso de que el usuario modifique el URL por un ID no existente
    if (!$resultQ1->num_rows) {
        header('location: /admin/usuarios.php');
    }

    //Guardar usuario
    $user = mysqli_fetch_assoc($resultQ1);

    //Actualizar estado del usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $estado = $_POST['estado'];
        
        //Actualiza en la base de datos
        $query2 = "UPDATE usuarios SET estado = '$estado' WHERE id_iest = $id";
        $resultQ2 = mysqli_query($db, $query2);

        //Redireccionar en caso de todo correcto y 
        //pasar un número para mostrar un mensaje
        if ($resultQ2) {
            header("Location: /admin/usuarios.php?result=1");
        }
    }
?>