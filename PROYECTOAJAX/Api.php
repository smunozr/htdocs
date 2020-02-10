<?php
    include_once ("funcs.php");
    $func=$_REQUEST["func"];
  //  $pswd=$_REQUEST["pswd"];
// $usu=$_REQUEST["usu"];
    switch ($func){
        case 1: echo login();
            break;
        case 2: logoff();
            break;
        case 3: select();
            break;
        case 4: insert();
            break;
        case 5: delete();
            break;
    }
