<?php 
//Guardamos el área por medio del URL
$area = $_GET['area'] ?? null;

if (!$area) {
    header('location: /menu.php');
}

//Obtener categorias
$query_cat = "SELECT DISTINCT categoria FROM menu WHERE area = '$area'";
$resultQ_cat = mysqli_query($db, $query_cat);
?>