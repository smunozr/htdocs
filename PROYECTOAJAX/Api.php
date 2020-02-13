<?php
    session_start();
    include_once ("funcs.php");
    $func=$_REQUEST["func"];
    $usu=$_REQUEST["usu"]??"";
    $pswd=$_REQUEST["pw"]??"";
    switch ($func){
        case 1: echo loggear($usu, $pswd);
            break;
        case 2: echo logoff();
            break;
        case 3: echo select();
            break;
        case 4: echo insert("002","Juegos del Hambre","2:45");
            break;
        case 5: echo delete();
            break;
    }
