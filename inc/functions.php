<?php

function debug($variable){
    echo '<pre>'.print_r($variable, true).'</pre>';
}

function str_random($length){
    $alphabet= "0123456789AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn"; 
    return substr(str_shuffle(str_repeat($alphabet,$length)), 0, $length); //On prend $alphabet ou on autorise à ce que chaque caractère soit présent 60x, on mélange et on prend seulement 60 de ces caractères
}

function logged(){
    if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    if(isset($_SESSION['auth'])){
        return true;
        exit();
    }
    else{
        return false;
    }
}