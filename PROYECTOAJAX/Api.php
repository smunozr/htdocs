<?php
    include_once ("funcs.php");
    $func=$_REQUEST["func"];
    switch ($func){
        case 1: echo login("a","a");
            break;
        case 2: echo logoff();
            break;
        case 3: echo select();
            break;
        case 4: echo insert();
            break;
        case 5: echo delete();
            break;
    }
