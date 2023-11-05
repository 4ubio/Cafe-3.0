<?php 
//Obtenemos el id del URL para poder realizar la consulta de que platillo mostrar
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

$cant = $_GET['cant'];
$cant = filter_var($cant, FILTER_VALIDATE_INT);

//Validación en caso de que el usuario modifique el URL eliminando el ID o cantidad
if (!$id) {
    header('location: /menu.php');
}

if (!$cant) {
    header('location: /menu.php');
}

//Consultar la base de datos para obtener el platillo con el ID indicado en el URL
$query = "SELECT * FROM menu WHERE id = $id";
$result = mysqli_query($db, $query);

//Validación en caso de no existir el platillo
if (!$result->num_rows) {
    header('location: /menu.php');
}

//Guardamos la fila del platillo deseado
$platillo = mysqli_fetch_assoc($result);

//Datos del usuario para crear el pedido
$nombre = $_SESSION['nombre'] . " " . $_SESSION['apellido'];
$id_iest = $_SESSION['id-iest'];
$email = $_SESSION['email'];
$hora = date('H:i',time() - 21600);
$fecha = date('Y/m/d');

//Calcular total
$nombre_platillo = $platillo['nombre'];
$area = $platillo['area'];
$total = $platillo['precio'] * $cant;

// ----- Fijar tiempo dinámico -----
//Obtener número de platillos en preparación
$query_pedidos = "SELECT * FROM pedidos WHERE area = '$area' AND estado = 'En preparación'";
$result_pedidos = mysqli_query($db, $query_pedidos);
$num_pedidos = $result_pedidos->num_rows;

if ($num_pedidos < 10) {
    $tiempo = $platillo['tiempo'];
} else {
    $multiplos = intdiv($num_pedidos, 10);
    $tiempo = $platillo['tiempo'] * ($multiplos + 1);
}

// ----- Validación de la hora -----
$now = date('H:i',time() - 21600);
$hora_inicio = $platillo['hora_inicio'];
$hora_fin = $platillo['hora_fin'];

//Confirm

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Inserta en la base de datos con este Query
    $query = "INSERT INTO pedidos (id_producto, nombre_platillo, cantidad, total, cliente, id_iest, hora, fecha, estado, area)
    VALUES ('$id', '$nombre_platillo', '$cant', '$total', '$nombre', '$id_iest', '$hora', '$fecha', 'En preparación', '$area') ";

    $result = mysqli_query($db, $query);

    //Redireccionar en caso de todo correcto y 
    //pasar un número para mostrar un mensaje
    if ($result) {
        header("Location: /pedidos.php?result=1");
    }
}
?>