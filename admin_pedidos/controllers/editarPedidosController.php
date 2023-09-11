<?php
    //Obtenemos el id del URL para poder realizar la consulta de que platillo editar
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //Validación en caso de que el usuario modifique el URL eliminando el ID
    if (!$id) {
        header('location: /admin_pedidos/pedidos.php');
    }

    //Consultar la base de datos para obtener el platillo con el ID indicado en el URL
    $query1 = "SELECT * FROM pedidos WHERE id = $id";
    $resultQ1 = mysqli_query($db, $query1);

    //Validación en caso de que el usuario modifique el URL por un ID no existente
    if (!$resultQ1->num_rows) {
        header('location: /admin_pedidos/pedidos.php');
    }

    //Guardar pedido
    $pedido = mysqli_fetch_assoc($resultQ1);

    //Actualizar estado del pedido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];
        
        //Actualiza en la base de datos
        $query2 = "UPDATE pedidos SET estado = '$status' WHERE id = $id";
        $resultQ2 = mysqli_query($db, $query2);

        //Redireccionar en caso de todo correcto y 
        //pasar un número para mostrar un mensaje
        if ($resultQ2) {
            header("Location: /admin_pedidos/pedidos.php?result=1");
        }
    }
?>