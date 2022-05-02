<?php 

/*
    Archivo para la conexión a la base de datos,
    modifialo en tu laptop si lo ves necesario.
    En caso de tener error, imprimira un mensaje de error.
*/

function conectardb() : mysqli {
    $db = mysqli_connect('localhost', 'root', '', 'Cafe3');

    if (!$db) {
        echo "Error, no se pudo conectar";
        exit;
    }

    return $db;
}