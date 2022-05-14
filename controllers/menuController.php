<?php 
//Escribir el query y obtener el resultado (Obtener todos los registros de la tabla menu)
$query = "SELECT * FROM menu ORDER BY nombre ASC";
$resultQ1 = mysqli_query($db, $query);
?>