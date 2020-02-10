<?php
const USER_CONSULT="c";
const USER_EDITOR="e";

function comprobarSeguridad(){
    $comp=false;
    if(isset($_SESSION["tipo"])&&$_SESSION["tipo"]==USER_EDITOR){

        $comp=true;
    }

    return($comp);
}

    function compobarAmbos(){
        $comp=false;
    if (isset($_SESSION["tipo"])&&($_SESSION["tipo"]==USER_EDITOR||$_SESSION["tipo"]==USER_CONSULT)){

        $comp=true;
    }

    return false;
}
?>