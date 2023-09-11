<?php 
//Escribir el query y obtener el resultado
$query = "SELECT * FROM usuarios WHERE tipo = 0 ORDER BY id_iest ASC";
$resultQ1 = mysqli_query($db, $query);

//Guardamos el numero pasado por medio del URL, este sirve para mostrar mensajes
$resultGet = $_GET['result'] ?? null;
?>