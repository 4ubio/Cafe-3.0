<?php
$today = date('Y/m/d');

//Pedidos En preparación
$query1 = "SELECT * FROM pedidos WHERE estado = 'En preparación' AND fecha = '$today'";
$resultQ1 = mysqli_query($db, $query1);
$num_preparacion = $resultQ1->num_rows;

//Pedidos Listos para recoger
$query2 = "SELECT * FROM pedidos WHERE estado = 'Listo para recoger' AND fecha = '$today'";
$resultQ2 = mysqli_query($db, $query2);
$num_listos = $resultQ2->num_rows;

//Pedidos Entregados
$query3 = "SELECT * FROM pedidos WHERE estado = 'Entregado' AND fecha = '$today'";
$resultQ3 = mysqli_query($db, $query3);
$num_entregados = $resultQ3->num_rows;

//Suma de ingresos
$query4 = "SELECT SUM(total) FROM pedidos WHERE estado = 'Entregado' AND fecha = '$today'";
$resultQ4 = mysqli_query($db, $query4);
$assoc = mysqli_fetch_assoc($resultQ4); 
$total = $assoc["SUM(total)"];
?>