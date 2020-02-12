<?php
    session_start();
    include_once ("funcs.php");
    $func=$_REQUEST["func"];
    switch ($func){
        case 1: echo loggear("a","a");
            break;
        case 2: echo logoff();
            break;
        case 3: echo select();
            break;
        case 4: echo insert("003","The Avengers: Infinite War","2:45");
            break;
        case 5: echo delete();
            break;
    }
