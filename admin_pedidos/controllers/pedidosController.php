<?php
//Guardamos el numero pasado por medio del URL, este sirve para mostrar mensajes
$resultGet = $_GET['result'] ?? null;

//Escribir el query y obtener el resultado
$query1 = "SELECT * FROM pedidos WHERE estado = 'En preparación'";
$resultQ1 = mysqli_query($db, $query1);

$query2 = "SELECT * FROM pedidos WHERE estado = 'Listo para recoger'";
$resultQ2 = mysqli_query($db, $query2);

$query3 = "SELECT * FROM pedidos WHERE estado = 'Entregado'";
$resultQ3 = mysqli_query($db, $query3);
?>