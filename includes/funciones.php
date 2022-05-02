<?php 

/*
    Esto lo ocuparemos mas tarde para las sesiones de los usuarios
    y revisar si se han registrado con sus credenciales antes de entrar a menu 
    o cualquier otra parte de la plataforma.
*/

function isAuth($word) {
    session_start();
    $auth = $_SESSION[$word];

    if ($auth) {
        return true;
    }

    return false;
}