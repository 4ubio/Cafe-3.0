<?php
//Fecha actual - Query
$fecha = date('Y/m/d');

//Guardamos el numero pasado por medio del URL, este sirve para mostrar mensajes
$resultGet = $_GET['result'] ?? null;

//Estados por recorrer
$estados = array('En preparación', 'Listo para recoger', 'Entregado');
?>