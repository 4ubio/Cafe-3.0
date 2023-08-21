<?php
//Guardamos el numero pasado por medio del URL, este sirve para mostrar mensajes
$resultGet = $_GET['result'] ?? null;

//Escribir el query y obtener el resultado (Obtener todos los registros de la tabla pedidos del usuario)
$id_iest = $_SESSION['id-iest'];

$query = "SELECT * FROM pedidos WHERE id_iest = $id_iest ORDER BY id DESC";
$result = mysqli_query($db, $query);
?>