<?php 

//Esto lo ocuparemos mas tarde para las sessiones de los usuarios, luego de explico

function isAuth($word) {
    session_start();
    $auth = $_SESSION[$word];

    if ($auth) {
        return true;
    }

    return false;
}