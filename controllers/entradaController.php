<?php 
//Obtenemos el id del URL para poder realizar la consulta de que platillo mostrar
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//Validación en caso de que el usuario modifique el URL eliminando el ID
if (!$id) {
    header('location: /menu.php');
}

//Consultar la base de datos para obtener el platillo con el ID indicado en el URL
$query = "SELECT * FROM menu WHERE id = $id";
$result = mysqli_query($db, $query);

//Validación en caso de que el usuario modifique el URL por un ID no existente
if (!$result->num_rows) {
    header('location: /menu.php');
}

//Guardamos la fila del platillo deseado
$platillo = mysqli_fetch_assoc($result);

//Redireccionar al seleccionar un platillo y cantidad
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cant = (int) $_POST['cant'];
    $url = "confirmar_pedido.php?id=$id&cant=$cant";
    header("Location: $url");
}
?>