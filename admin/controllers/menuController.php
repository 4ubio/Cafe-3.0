<?php 
//Escribir el query y obtener el resultado
$query = "SELECT * FROM menu WHERE area = 'Café' ORDER BY categoria ASC";
$resultQ1 = mysqli_query($db, $query);

$query = "SELECT * FROM menu WHERE area = 'Pérgola' ORDER BY categoria ASC";
$resultQ2 = mysqli_query($db, $query);

$query = "SELECT * FROM menu WHERE area = 'Snacks' ORDER BY categoria ASC";
$resultQ3 = mysqli_query($db, $query);

$query = "SELECT * FROM menu WHERE area = 'Paninis' ORDER BY categoria ASC";
$resultQ4 = mysqli_query($db, $query);

//Guardamos el numero pasado por medio del URL, este sirve para mostrar mensajes
$resultGet = $_GET['result'] ?? null;
?>